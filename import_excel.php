<?php
include('dbConnection.php'); // Conexão com o banco de dados
require 'vendor/autoload.php'; // Autoload do PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\IOFactory;


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['excel_file'])) {
    $file = $_FILES['excel_file']['tmp_name'];

    // Carregar o arquivo Excel
    $spreadsheet = IOFactory::load($file);
    $worksheet = $spreadsheet->getActiveSheet();

    // Definir variáveis
    $eid = uniqid(); // Gera um EID único para o quiz
    $status = "active"; // Status do quiz
    $quizTitle = ''; // Título do questionário
    $questionsData = []; // Para armazenar perguntas e opções

    // Percorrer as linhas do Excel
    foreach ($worksheet->getRowIterator() as $rowIndex => $row) {
        if ($rowIndex == 1) continue; // Ignorar cabeçalho

        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);

        // Inicializar variáveis para cada linha
        $question = '';
        $options = [];
        $timeLimit = 0;
        $correctAnswerId = ''; // Armazenar a resposta correta como letra

        foreach ($cellIterator as $cell) {
            $columnIndex = $cell->getColumn();
            $value = $cell->getValue();

            switch ($columnIndex) {
                case 'A':
                    if (!empty($value)) {
                        $quizTitle = $value; // Define o título do quiz
                    }
                    break;
                case 'B':
                    if (!empty($value)) {
                        $question = $value; // Nova pergunta
                    }
                    break;
                case 'C':
                case 'D':
                case 'E':
                case 'F':
                    if (!empty($value)) {
                        $options[] = $value; // Adiciona uma opção
                    }
                    break;
                case 'G':
                    if (is_numeric($value)) {
                        $timeLimit = (int)$value; // Define o limite de tempo para a pergunta
                    }
                    break;
                case 'H':
                    if (!empty($value) && preg_match('/^[A-D]$/', $value)) { // Verifica se a resposta é uma letra válida (A-D)
                        $correctAnswerId = $value; // Define a resposta correta (A, B, C, D)
                    }
                    break;
            }
        }

        // Salvar a pergunta e suas opções
        if (!empty($question) && !empty($correctAnswerId)) { // Confirme que temos um valor para a pergunta e opção correta
            $questionsData[] = [
                'question' => $question,
                'options' => $options,
                'timeLimit' => $timeLimit,
                'correctAnswerId' => $correctAnswerId, // Aqui salvamos a letra da resposta correta
            ];
        }
    }

    // Inserir o quiz na tabela quiz se houver dados
    if (!empty($quizTitle)) {
        $checkQuizQuery = "SELECT * FROM quiz WHERE title = ?";
        $stmtCheckQuiz = $con->prepare($checkQuizQuery);
        $stmtCheckQuiz->bind_param("s", $quizTitle);
        $stmtCheckQuiz->execute();
        $result = $stmtCheckQuiz->get_result();

        if ($result->num_rows > 0) {
            die('Um quiz com esse título já existe. Importação cancelada.');
        }

        // Inserir o quiz na tabela quiz
        $queryQuiz = "INSERT INTO quiz (eid, title, total, time, date, status) VALUES (?, ?, ?, ?, NOW(), ?)";
        $stmtQuiz = $con->prepare($queryQuiz);
        $totalQuestions = count($questionsData);
        $timeLimit = !empty($questionsData) ? end($questionsData)['timeLimit'] : 0;

        $stmtQuiz->bind_param("isiss", $eid, $quizTitle, $totalQuestions, $timeLimit, $status);

        if (!$stmtQuiz->execute()) {
            die('Erro ao inserir o quiz: ' . $stmtQuiz->error);
        }

        // Loop para inserir perguntas e suas opções
        foreach ($questionsData as $index => $data) {
            $queryQuestion = "INSERT INTO questions (eid, qid, qns, choice, sn) VALUES (?, ?, ?, ?, ?)";
            $stmtQuestion = $con->prepare($queryQuestion);
            $sn = $index + 1; // Número da pergunta (sequencial)
            $qid = uniqid(); // Gera um qid único

            // Bind dos parâmetros
            $stmtQuestion->bind_param("issii", $eid, $qid, $data['question'], $data['correctAnswerId'], $sn);

            if (!$stmtQuestion->execute()) {
                die('Erro ao inserir a pergunta: ' . $stmtQuestion->error);
            }

            // Inserir as opções
            foreach ($data['options'] as $option) {
                if (!empty($option)) {
                    $optionid = uniqid(); // Gera um optionid único
                    $queryOption = "INSERT INTO options (qid, option, optionid) VALUES (?, ?, ?)";
                    $stmtOption = $con->prepare($queryOption);
                    $stmtOption->bind_param("sss", $qid, $option, $optionid);
                    if (!$stmtOption->execute()) {
                        die('Erro ao inserir a opção: ' . $stmtOption->error);
                    }
                }
            }
        }

        // Inserir informações na tabela history
        $email = 'example@example.com'; // Defina o e-mail conforme necessário
        $score = 0; // Defina a pontuação inicial
        $level = 1; // Defina o nível inicial
        $sahi = 0; // Número de respostas corretas
        $wrong = 0; // Número de respostas incorretas

        $queryHistory = "INSERT INTO history (email, eid, score, level, sahi, wrong, date) VALUES (?, ?, ?, ?, ?, ?, NOW())";
        $stmtHistory = $con->prepare($queryHistory);
        $stmtHistory->bind_param("ssiiii", $email, $eid, $score, $level, $sahi, $wrong);
        
        if (!$stmtHistory->execute()) {
            die('Erro ao inserir no histórico: ' . $stmtHistory->error);
        }

        echo "Importação concluída com sucesso!";
    } else {
        echo "Nenhum título do quiz encontrado.";
    }
} else {
    echo "Nenhum arquivo foi enviado.";
}
?>
