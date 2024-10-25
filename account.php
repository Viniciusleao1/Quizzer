<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Quiz de Perguntas </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

 
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
 <!--alert message-->
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<!--alert message end-->

</head>
<?php
include_once 'dbConnection.php';
?>
<body>
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">Teste sua habilidade</span></div>
<div class="col-md-4 col-md-offset-2">
 <?php
 include_once 'dbConnection.php';
session_start();
  if(!(isset($_SESSION['email']))){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];
$email=$_SESSION['email'];

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Olá,</span> <a href="account.php?q=1" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Sair</button></a></span>';
}?>
</div>
</div></div>
<div class="bg">

<!--navigation menu-->
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Alternar navegação</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><b>Dashboard</b></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?> ><a href="account.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Inicio<span class="sr-only">(current)</span></a></li>
        <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="account.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Histórico</a></li>
		<li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="account.php?q=3"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Ranking</a></li></ul>
            <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Insira a tag ">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Procurar</button>
      </form>
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">

<!--home start-->
<?php if(@$_GET['q']==1) {

$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b>N.</b></td><td><b>Questionário</b></td><td><b>Total de Perguntas</b></td><td><b>Marcadas</b></td><td><b>Limite de tempo</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['time'];
	$eid = $row['eid'];
$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
$rowcount=mysqli_num_rows($q12);	
if($rowcount == 0){
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="account.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Começar</b></span></a></b></td></tr>';
}
else
{
echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Reiniciar</b></span></a></b></td></tr>';
}
}
$c=0;
echo '</table></div>';

}?>
<!--<span id="countdown" class="timer"></span>
<script>
var seconds = 40;
    function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById('countdown').innerHTML = minutes + ":" +    remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Buzz Buzz";
    } else {    
        seconds--;
    }
    }
var countdownTimer = setInterval('secondPassed()', 1000);
</script>-->

<!--home closed-->

<!--quiz start-->
<?php 
if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {
    $eid = @$_GET['eid'];
    $sn = @$_GET['n'];
    $total = @$_GET['t'];

    // Busca o tempo permitido na tabela 'quiz'
    $quizQuery = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid'") or die('Erro ao buscar quiz: ' . mysqli_error($con));
    $quizRow = mysqli_fetch_array($quizQuery);

    // Armazena o tempo limite do quiz em minutos na variável $timeLimit
    $timeLimit = $quizRow['time']; // Tempo total do quiz (em minutos)
    $totalTime = $timeLimit * 60; // Converte para segundos

    // Busca a pergunta atual
    $q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' AND sn='$sn'");

    echo '<div class="container" style="margin-top: 20px;">';

    // Temporizador
    echo '<div style="text-align: left; position: absolute; top: 20px; left: 20px;">
            <font size="3" style="margin-left:100px;font-family:\'typo\'; font-size:20px; font-weight:bold;color:darkred">Tempo Restante: </font><span class="timer btn btn-default" style="margin-left:20px;">
                <font style="font-family:\'typo\';font-size:20px;font-weight:bold;color:darkblue" id="countdown"></font>
            </span>
          </div>';

    echo '<div class="panel" style="margin: 5%; padding: 20px; border-radius: 10px; background-color: #f9f9f9; box-shadow: 0 0 15px rgba(0,0,0,0.1);">';

// Exibe as perguntas
while ($row = mysqli_fetch_array($q)) {
  $qns = $row['qns'];
  $qid = $row['qid'];
  
  // Novo estilo para a questão
  echo '<div style="font-size: 22px; font-weight: bold; font-family: Arial, sans-serif; margin-bottom: 25px; padding: 10px; background-color: #f0f0f0; border-radius: 5px;">'; 
  echo 'Questão ' . $sn . ': ' . nl2br(htmlspecialchars($qns)); 
  echo '</div>'; 
}

// Busca as opções da questão 
$q = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid'"); 

// Formulário para as opções 
echo '<form action="update.php?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&qid=' . $qid . '" method="POST" class="form-horizontal" style="margin-top: 20px;">'; 

// Opções com novo estilo
$options = [];
while ($row = mysqli_fetch_array($q)) { 
  $option = stripslashes($row['option']); 
  $optionid = $row['optionid']; 
  $options[] = ['option' => $option, 'optionid' => $optionid];
}

// Formata as opções
$optionLabels = ['a', 'b', 'c', 'd']; 
echo '<div class="funkyradio">'; 
foreach ($options as $index => $optionRow) {
  $optionid = $optionRow['optionid'];
  $option = $optionRow['option'];
  if (isset($optionLabels[$index])) {
      echo '<div class="funkyradio-success" style="margin-bottom: 20px; padding: 5px; background-color: #e0e0e0; border-radius: 5px;"> 
              <input type="radio" id="' . $optionid . $index . '" name="ans" value="' . $optionid . '" required> 
              <label for="' . $optionid . $index . '" style="font-size: 18px; color: #333; padding-left: 15px;"> 
                  ' . $optionLabels[$index] . '. ' . htmlspecialchars($option) . ' 
              </label> 
            </div>'; 
  }
}
echo '</div>';  
    
    // Botão "Resetar" para voltar à primeira questão 
    echo '<button type="button" id="restartQuiz" class="btn btn-warning" style="margin-top: 20px;"> 
            <span class="glyphicon glyphicon-refresh"></span>&nbsp;Resetar 
          </button>';

    echo '<script>
        document.getElementById("restartQuiz").addEventListener("click", function() {
            // Redirecionar para a primeira pergunta
            window.location.href = "account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '";
        });
    </script>';
    
    // Botão para próxima questão 
    echo '<button type="submit" class="btn btn-primary" style="margin-top: 20px; margin-left: 20px; padding: 10px 20px;"> 
            <span class="glyphicon glyphicon-arrow-right"></span>&nbsp;Próxima Questão 
          </button>'; 
    echo '</form>'; 
    echo '</div>'; 
    echo '</div>'; 

    // Cálculo do tempo restante
    $startTime = time(); // Registra o início do quiz
    $endTime = $startTime + $totalTime; // Calcula o tempo final

    echo '<script>
        var totalTime = ' . $totalTime . ';
        var endTime = ' . $endTime . ';

        function updateCountdown() {
            var now = Math.floor(Date.now() / 1000); // Tempo atual em segundos
            var remaining = endTime - now; // Calcula o tempo restante

            if (remaining < 0) {
                remaining = 0; // Não permitir valores negativos
            }

            var minutes = Math.floor(remaining / 60);
            var seconds = remaining % 60;
            if (seconds < 10) {
                seconds = "0" + seconds; // Formata para dois dígitos
            }

            document.getElementById("countdown").innerHTML = minutes + ":" + seconds; // Atualiza o temporizador

            // Redireciona quando o tempo esgotar
            if (remaining <= 0) {
                clearInterval(countdownTimer);
                window.location.href = "account.php?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&endquiz=end";
            }
        }

        var countdownTimer = setInterval(updateCountdown, 1000); // Atualiza a cada segundo
        updateCountdown(); // Chama imediatamente para evitar espera
    </script>';
    // Centralizar a paginação horizontalmente
echo '<div class="pagination" style="display: flex; justify-content: center; align-items: center; margin-top: 20px;">';
for ($i = 1; $i <= $total; $i++) {
    if ($i == $sn) {
        echo '<span style="margin:5px;padding:5px;background-color:darkgreen;color:white;">' . $i . '</span>'; // Destacar a pergunta atual
    } else {
        echo '<a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=' . $i . '&t=' . $total . '" style="margin:5px;padding:5px;background-color:darkred;color:white;">' . $i . '</a>';
    }
}
echo '</div>';

    // Lógica para processar respostas e pontuação
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $selectedOptionId = $_POST['ans']; // Resposta do usuário
        $correctAnswerQuery = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid'");
        $correctAnswerRow = mysqli_fetch_array($correctAnswerQuery);
        $correctOptionId = $correctAnswerRow['ansid']; // Resposta correta

        // Verifica se a resposta está correta
        if ($selectedOptionId == $correctOptionId) {
            // Resposta correta: incrementa a pontuação e marca como correta
            mysqli_query($con, "UPDATE history SET score=score+1, sahi=sahi+1 WHERE eid='$eid' AND email='{$_SESSION['email']}'");
        } else {
            // Resposta errada: incrementa o número de respostas erradas
            mysqli_query($con, "UPDATE history SET wrong=wrong+1 WHERE eid='$eid' AND email='{$_SESSION['email']}'");
        }

        // Atualiza o nível da pergunta
        mysqli_query($con, "UPDATE history SET level='$sn' WHERE eid='$eid' AND email='{$_SESSION['email']}'");

        // Redireciona para a próxima questão
        $sn++;
        if ($sn <= $total) {
            header("location:account.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total");
        } else {
            // Redireciona para o final do quiz se todas as questões foram respondidas
            header("location:account.php?q=result&eid=$eid");
        }
    }
}


// result display
if (@$_GET['q'] == 'result' && @$_GET['eid']) {
  $eid = @$_GET['eid'];
  $email = $_SESSION['email'];

  // Exibe o resultado principal
  $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND email='$email'") or die('Error157');
  echo  '<div class="panel">
  <center><h1 class="title" style="color:#660033">Resultado</h1></center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

  while ($row = mysqli_fetch_array($q)) {
      $s = $row['score'];
      $w = $row['wrong'];
      $r = $row['sahi'];
      $qa = $row['level'];
      echo '<tr style="color:#66CCFF"><td>Total de Questões</td><td>' . $qa . '</td></tr>
            <tr style="color:#99cc32"><td>Respostas Corretas&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>' . $r . '</td></tr> 
            <tr style="color:red"><td>Respostas Erradas&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>' . $w . '</td></tr>
            <tr style="color:#66CCFF"><td>Pontuação&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>' . $s . '</td></tr>';
  }

  $q = mysqli_query($con, "SELECT * FROM rank WHERE email='$email'") or die('Error157');
  while ($row = mysqli_fetch_array($q)) {
      $s = $row['score'];
      echo '<tr style="color:#990000"><td>Pontuação Geral&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>' . $s . '</td></tr>';
  }
  echo '</table></div>';

  // Início da Análise Detalhada
  echo '<div class="panel">
  <h2 class="title" style="color:#660033" align="center">:: Análise Detalhada ::</h2>
  <table class="table table-striped title1" style="font-size:18px;">';

  // Busca todas as questões do quiz
  $questionsQuery = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid'");
  while ($questionRow = mysqli_fetch_array($questionsQuery)) {
      $qid = $questionRow['qid'];
      $qns = $questionRow['qns'];

      // Busca a resposta correta para cada questão na tabela 'answer'
      $correctAnswerQuery = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid'");
      $correctAnswerRow = mysqli_fetch_array($correctAnswerQuery);
      $correctOptionId = $correctAnswerRow['ansid'];

      // Busca a opção correta
      $correctOptionQuery = mysqli_query($con, "SELECT * FROM options WHERE optionid='$correctOptionId'");
      $correctOptionRow = mysqli_fetch_array($correctOptionQuery);
      $correctOption = $correctOptionRow['option'];

// Exibe a questão com estilo (verde escuro)
echo '<tr>
        <td style="background-color: #66CCFF; padding: 10px; color: white; border-left: 4px solid #5EA8FF;">
            <strong>Questão:</strong> ' . htmlspecialchars($qns) . '
        </td>
      </tr>';

// Exibe a resposta correta com estilo (verde escuro)
echo '<tr>
        <td style="background-color: #5EA82C; padding: 10px; color: white; border-left: 4px solid #006400;">
            <strong>Resposta Correta:</strong> ' . htmlspecialchars($correctOption) . '
        </td>
      </tr>';

// Busca a explicação na tabela 'notes'
$noteQuery = mysqli_query($con, "SELECT note FROM notes WHERE qid='$qid' AND eid='$eid'");
if ($noteRow = mysqli_fetch_array($noteQuery)) {
    $note = $noteRow['note'];

    // Exibe a explicação com estilo (fundo amarelo forte)
    echo '<tr>
            <td style="background-color: #F3B21C; padding: 10px; color: black; border-left: 4px solid #F5D92C;">
                <strong>Explicação:</strong> ' . htmlspecialchars($note) . '
            </td>
          </tr>';
} else {
    // Caso não haja explicação, exibe uma mensagem padrão
    echo '<tr>
            <td style="background-color: #F3B21C; padding: 10px; color: black; border-left: 4px solid #F5D92C;">
                <strong>Explicação:</strong> Nenhuma explicação disponível para esta pergunta.
            </td>
          </tr>';
}

  }
  echo '</table></div>';
}

?>


<!--quiz end-->
<?php
//history start
if(@$_GET['q']== 2) 
{
    $q = mysqli_query($con,"SELECT * FROM history WHERE email='$email' ORDER BY date DESC") or die('Error197');
    echo '<div class="panel title">
            <table class="table table-striped title1">
            <tr style="color:red">
                <td><b>N.</b></td>
                <td><b>Questionário</b></td>
                <td><b>Pergunta Resolvida</b></td>
                <td><b>Correta</b></td>
                <td><b>Errada</b></td>
                <td><b>Pontuação</b></td>
            </tr>';
    $c = 0;
    $acertos = [];
    $pontuacoes = [];
    $titulos = [];
    $total_perguntas_resolvidas = 0;
    
    while ($row = mysqli_fetch_array($q)) {
        $eid = $row['eid'];
        $s = (int)$row['score'];  // Garantir que pontuação seja tratada como número
        $w = (int)$row['wrong'];  // Garantir que erros sejam tratados como número
        $r = (int)$row['sahi'];   // Garantir que acertos sejam tratados como número
        $qa = (int)$row['level']; // Garantir que perguntas resolvidas sejam tratadas como número
        $total_perguntas_resolvidas += $qa;  // Acumular total de perguntas resolvidas
        
        $q23 = mysqli_query($con, "SELECT title FROM quiz WHERE eid='$eid'") or die('Error208');
        while ($row = mysqli_fetch_array($q23)) {
            $title = $row['title'];
        }
        $c++;
        echo '<tr><td>'.$c.'</td><td>'.$title.'</td><td>'.$qa.'</td><td>'.$r.'</td><td>'.$w.'</td><td>'.$s.'</td></tr>';
        
        // Armazenar dados para gráficos
        $acertos[] = $r;
        $pontuacoes[] = $s;
        $titulos[] = $title;
    }
    echo '</table></div>';
    
    // HTML para gráficos e dicas
    echo '
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <!-- Gráfico de Pizza -->
        <div style="width: 50%; position: relative;">
            <canvas id="acertosPieChart"></canvas>
        </div>
        
        <!-- Dicas ao lado direito com linhas que apontam para o gráfico -->
        <div style="width: 45%; padding-left: 20px; text-align: left; position: relative;">
            <h3>Dicas para melhorar:</h3>
            <ul style="list-style-type: none;">
                <li style="position: relative;">
                    <span style="color: green;">&#x25B2;</span> Foco nas perguntas que mais errou
                    <div style="position: absolute; left: -50px; top: 10px; border-top: 1px solid green; width: 50px;"></div>
                </li>
                <li style="position: relative;">
                    <span style="color: orange;">&#x25BA;</span> Revise os temas dos questionários
                    <div style="position: absolute; left: -50px; top: 10px; border-top: 1px solid orange; width: 50px;"></div>
                </li>
                <li style="position: relative;">
                    <span style="color: blue;">&#x25B6;</span> Pratique mais os tópicos de maior dificuldade
                    <div style="position: absolute; left: -50px; top: 10px; border-top: 1px solid blue; width: 50px;"></div>
                </li>
                <li style="position: relative;">
                    <span style="color: red;">&#x25BC;</span> Melhore a gestão do tempo para responder perguntas mais rápidas
                    <div style="position: absolute; left: -50px; top: 10px; border-top: 1px solid red; width: 50px;"></div>
                </li>
            </ul>
        </div>
    </div>
    
    <!-- Gráficos de linha e barras -->
    <div style="margin-top: 20px;">
        <canvas id="acertosLineChart"></canvas>
    </div>
    <div style="margin-top: 20px;">
        <canvas id="pontuacaoBarChart"></canvas>
    </div>';

    // JavaScript para os gráficos
    echo '
    <script>
        // Gráfico de Pizza - Porcentagem de Acertos
        const acertosPieCtx = document.getElementById("acertosPieChart").getContext("2d");
        const acertosPieChart = new Chart(acertosPieCtx, {
            type: "pie",
            data: {
                labels: ["Acertos", "Erros"],
                datasets: [{
                    data: [' . array_sum($acertos) . ', ' . ($total_perguntas_resolvidas - array_sum($acertos)) . '],
                    backgroundColor: ["#36A2EB", "#FF6384"]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Gráfico de Linha - Comparação de Acertos
        const acertosLineCtx = document.getElementById("acertosLineChart").getContext("2d");
        const acertosLineChart = new Chart(acertosLineCtx, {
            type: "line",
            data: {
                labels: ' . json_encode($titulos) . ',
                datasets: [{
                    label: "Acertos",
                    data: ' . json_encode($acertos) . ',
                    backgroundColor: "rgba(75, 192, 192, 0.2)",
                    borderColor: "rgba(75, 192, 192, 1)",
                    borderWidth: 1
                }]
            }
        });

        // Gráfico de Barras - Pontuação e Acertos
        const pontuacaoBarCtx = document.getElementById("pontuacaoBarChart").getContext("2d");
        const pontuacaoBarChart = new Chart(pontuacaoBarCtx, {
            type: "bar",
            data: {
                labels: ' . json_encode($titulos) . ',
                datasets: [
                    {
                        label: "Pontuação",
                        data: ' . json_encode($pontuacoes) . ',
                        backgroundColor: "rgba(255, 99, 132, 0.2)",
                        borderColor: "rgba(255, 99, 132, 1)",
                        borderWidth: 1
                    },
                    {
                        label: "Acertos",
                        data: ' . json_encode($acertos) . ',
                        backgroundColor: "rgba(54, 162, 235, 0.2)",
                        borderColor: "rgba(54, 162, 235, 1)",
                        borderWidth: 1
                    }
                ]
            }
        });
    </script>';
}

//ranking start
if (@$_GET['q'] == 3) {

  // Consultar usuários ordenados pela pontuação (score) em ordem decrescente
  $q = mysqli_query($con, "
      SELECT u.*, r.score 
      FROM user u 
      LEFT JOIN rank r ON u.email = r.email 
      ORDER BY r.score DESC
  ") or die('Error223'); // Consultar todos os usuários ordenados por score

  echo '<div class="panel title" style="width: 1060px; height: auto; position: relative;">';
  echo '<h2 style="text-align: center;">Ranking dos Usuários</h2>'; // Título
  echo '<div class="ranking-container" style="display: flex; flex-wrap: wrap; justify-content: center;">';

  $c = 0;

  while ($row_user = mysqli_fetch_array($q)) {
      $name = $row_user['name'];
      $gender = $row_user['gender'];
      $score = $row_user['score'] ?? 0; // Score padrão como 0

      // Definir o caminho do avatar com base no gênero
      if ($gender === 'M') {
          $avatarPath = '/image/user-profile-1.png'; // Para usuários masculinos
      } elseif ($gender === 'F') {
          $avatarPath = '/image/user-profile-2.png'; // Para usuários femininos
      } else {
          // Caminho padrão caso o gênero não seja reconhecido
          $avatarPath = '/image/default-avatar.png'; // Caminho de um avatar padrão
      }

      $c++;

      // Criar blocos individuais para cada usuário
      echo '
      <div class="user-block" style="width: 130px; height: 210px; margin: 10px; position: relative; background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
          <div class="user-rank" style="position: absolute; top: 0; left: 0; width: 50px; height: 50px;">
              <img src="/image/star.png" style="width: 50px; height: 50px; position: absolute; top: -10px; left: -10px;"/>
              <span style="position: absolute; top: 6px; left: 10px; color: #fff; font-size: 16px;">' . $c . '</span> <!-- Centraliza o número -->
          </div>
          <img src="' . $avatarPath . '" alt="Foto de ' . $name . '" class="user-image" style="border-radius: 50%; width: 110px; height: 110px; display: block; margin: 15px auto;"/>
          <p style="text-align: center; margin-top: 10px;"><b>' . $name . '</b></p> <!-- Nome abaixo do avatar -->
          <p style="text-align: center; margin-top: 5px;">Aprovações: ' . $score . '</p> <!-- Exibe o valor de score abaixo do nome -->
      </div>';

      // Nova linha após 6 blocos
      if ($c % 6 == 0) {
          echo '<div style="flex-basis: 100%; height: 0;"></div>'; // Limpa a linha para os próximos blocos
      }
  }

  echo '</div>'; // ranking-container
  echo '</div>'; // panel title

  // Bloco de Ranking de Escolas
  echo '<div class="panel title" style="margin-top: 40px;">';
  echo '<h2>Ranking de Escolas</h2>';
  echo '<div class="ranking-container" style="display: flex; flex-wrap: wrap; justify-content: center;">'; // Alinhamento igual ao dos usuários

  // Consultar todas as escolas com seus respectivos scores dos usuários
  $q_schools = mysqli_query($con, "
      SELECT u.college, r.score 
      FROM user u 
      LEFT JOIN rank r ON u.email = r.email 
      GROUP BY u.college 
      ORDER BY MAX(r.score) DESC
  ") or die('Error233');

  $c = 0;

  while ($row_school = mysqli_fetch_array($q_schools)) {
      $college = $row_school['college'];
      $score = $row_school['score'] ?? 0; // Score padrão como 0

      $c++;

      // Criar blocos individuais para cada escola
      echo '
      <div class="school-block" style="width: 130px; height: 210px; margin: 10px; position: relative; background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
          <div class="school-rank" style="position: absolute; top: 0; left: 0; width: 50px; height: 50px;">
              <img src="/image/star.png" style="width: 50px; height: 50px; position: absolute; top: -10px; left: -10px;"/>
              <span style="position: absolute; top: 6px; left: 10px; color: #fff; font-size: 16px;">' . $c . '</span>
          </div>
          <img src="/image/default.png" alt="Escola ' . $college . '" class="school-image" style="border-radius: 8px; width: 110px; height: 110px; display: block; margin: 10px auto;"/> <!-- Imagem padrão para escolas -->
          <p style="text-align: center; margin-top: 5px;"><b>' . $college . '</b></p> <!-- Nome da escola -->
          <p style="text-align: center; margin-top: 5px;">Aprovações: ' . $score . '</p> <!-- Exibe o score da escola -->
      </div>';

      // Nova linha após 6 blocos
      if ($c % 6 == 0) {
          echo '<div style="flex-basis: 100%; height: 0;"></div>'; // Limpa a linha para os próximos blocos
      }
  }

  echo '</div>'; // ranking-container
  echo '</div>'; // panel title
}
?>


</div></div></div></div>
<!--Footer start-->
<div class="row footer">
<div class="col-md-3 box">
<a href="/about.php" target="_blank">Sobre</a>
</div>
<div class="col-md-3 box">
<a href="#" data-toggle="modal" data-target="#login">Admin Login</a></div>
<div class="col-md-3 box">
<a href="#" data-toggle="modal" data-target="#developers">Developers</a>
</div>
<div class="col-md-3 box">
<a href="feedback.php" target="_blank">Feedback</a></div></div>
<!-- Modal For Developers-->
<div class="modal fade title1" id="developers">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
        <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">Developers</span></h4>
      </div>
	  
      <div class="modal-body">
        <p>
		<div class="row">
		<div class="col-md-4">
		 <img src="image/CAM00121.jpg" width=100 height=100 alt="Vinicius Desenvolvedor" class="img-rounded">
		 </div>
		 <div class="col-md-5">
		<a href="https://github.com/Viniciusleao1" style="color:#202020; font-family:'typo' ; font-size:18px" title="Find on Facebook">Viniciusleao1</a>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">🚀🚀</h4>
		<h4 style="font-family:'typo' ">https://github.com/Viniciusleao1</h4>
		<h4 style="font-family:'typo' ">Vinicius Desenvolvedor</h4></div></div>
		</p>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Modal for admin login-->
	 <div class="modal fade" id="login">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
        <h4 class="modal-title"><span style="color:orange;font-family:'typo' ">LOGIN</span></h4>
      </div>
      <div class="modal-body title1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<form role="form" method="post" action="admin.php?q=index.php">
<div class="form-group">
<input type="text" name="uname" maxlength="20"  placeholder="Admin user id" class="form-control"/> 
</div>
<div class="form-group">
<input type="password" name="password" maxlength="15" placeholder="Password" class="form-control"/>
</div>
<div class="form-group" align="center">
<input type="submit" name="login" value="Login" class="btn btn-primary" />
</div>
</form>
</div><div class="col-md-3"></div></div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--footer end-->


</body>
</html>
