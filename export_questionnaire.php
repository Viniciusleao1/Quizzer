<?php

include('dbConnection.php'); // Conexão com o banco de dados
require 'vendor/autoload.php'; // Autoload do PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['questionnaire'])) {
    $questionnaireTitle = $_POST['questionnaire'];

    // Consultar o questionário no banco de dados
    $queryQuiz = "SELECT * FROM quiz WHERE title = ?";
    $stmtQuiz = $con->prepare($queryQuiz);
    $stmtQuiz->bind_param("s", $questionnaireTitle);
    $stmtQuiz->execute();
    $quizResult = $stmtQuiz->get_result();

    if ($quizResult->num_rows > 0) {
        $quiz = $quizResult->fetch_assoc();
        $eid = $quiz['eid']; // EID do quiz

        // Consultar as perguntas associadas ao quiz
        $queryQuestions = "SELECT * FROM questions WHERE eid = ?";
        $stmtQuestions = $con->prepare($queryQuestions);
        $stmtQuestions->bind_param("s", $eid);
        $stmtQuestions->execute();
        $questionsResult = $stmtQuestions->get_result();

        // Criar um novo Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Cabeçalhos
        $sheet->setCellValue('A1', 'Pergunta');
        $sheet->setCellValue('B1', 'Opção A');
        $sheet->setCellValue('C1', 'Opção B');
        $sheet->setCellValue('D1', 'Opção C');
        $sheet->setCellValue('E1', 'Opção D');
        $sheet->setCellValue('F1', 'Tempo (min)');
        $sheet->setCellValue('G1', 'Resposta Correta');

        // Início da linha de dados
        $row = 2;

        // Percorrer todas as perguntas
        while ($question = $questionsResult->fetch_assoc()) {
            $qid = $question['qid'];

            // Obter as opções
            $queryOptions = "SELECT * FROM options WHERE qid = ?";
            $stmtOptions = $con->prepare($queryOptions);
            $stmtOptions->bind_param("s", $qid);
            $stmtOptions->execute();
            $optionsResult = $stmtOptions->get_result();

            // Inicializar um array para armazenar opções
            $options = [];
            while ($option = $optionsResult->fetch_assoc()) {
                $options[] = $option['option'];
            }

            // Adiciona os dados ao Excel
            $sheet->setCellValue('A' . $row, $question['qns']); // Pergunta

            // Adicionar opções
            for ($i = 0; $i < 4; $i++) {
                if (isset($options[$i])) {
                    $sheet->setCellValue(chr(66 + $i) . $row, $options[$i]); // B, C, D, E para Opção A, B, C, D
                } else {
                    $sheet->setCellValue(chr(66 + $i) . $row, ''); // Garantir que não haja erro se a opção não existir
                }
            }

            // Informações adicionais
            $sheet->setCellValue('F' . $row, $question['time']); // Tempo
            $sheet->setCellValue('G' . $row, $question['choice']); // Resposta Correta

            // Incrementar a linha
            $row++;
        }

        // Nome do arquivo
        $filename = 'questionario_' . $questionnaireTitle . '.xlsx';

        // Enviar o arquivo para download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Salvar o arquivo
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit; // Finaliza o script
    } else {
        echo "Questionário não encontrado.";
    }
} else {
    echo "Nenhum questionário foi selecionado.";
}
?>
