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

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

<script>
$(function () {
    $(document).on( 'scroll', function(){
        console.log('scroll top : ' + $(window).scrollTop());
        if($(window).scrollTop()>=$(".logo").height())
        {
             $(".navbar").addClass("navbar-fixed-top");
        }

        if($(window).scrollTop()<$(".logo").height())
        {
             $(".navbar").removeClass("navbar-fixed-top");
        }
    });
});</script>
</head>

<body  style="background:#eee;">
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">Teste sua habilidade</span></div>
<?php
 include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];
  if(!(isset($_SESSION['email']))){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Olá,</span> <a href="account.php" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Sair</button></a></span>';
}?>

</div></div>
<!-- admin start-->

<!--navigation menu-->
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dash.php?q=0"><b>Dashboard</b></a>
    </div>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav">
    <li <?php if(@$_GET['q']==0) echo 'class="active"'; ?>><a href="dash.php?q=0">Inicio<span class="sr-only">(current)</span></a></li>
    <li <?php if(@$_GET['q']==1) echo 'class="active"'; ?>><a href="dash.php?q=1">Usuário</a></li>
    <li <?php if(@$_GET['q']==2) echo 'class="active"'; ?>><a href="dash.php?q=2">Ranking</a></li>
    <li <?php if(@$_GET['q']==3) echo 'class="active"'; ?>><a href="dash.php?q=3">Feedback</a></li>
    <li class="dropdown <?php if(@$_GET['q']==4 || @$_GET['q']==5) echo 'active'; ?>">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quiz<span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="dash.php?q=4">Adicionar Quiz</a></li>
        <li><a href="dash.php?q=5">Remover Quiz</a></li>
      </ul>
    </li>
    <li <?php if(@$_GET['q']==6) echo 'class="active"'; ?>><a href="dash.php?q=6">Notas</a></li> <!-- Nova sessão "Notas" -->
    <li <?php if(@$_GET['q']==7) echo 'class="active"'; ?>><a href="dash.php?q=7">Importar/Exportar</a></li>
  </ul>
</div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
</nav>
<!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">
<!--home start-->

<?php if(@$_GET['q']==0) {

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

}

//ranking start
if(@$_GET['q']== 2) 
{
$q=mysqli_query($con,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
echo  '<div class="panel title">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>Rank</b></td><td><b>Nome</b></td><td><b>Gênero</b></td><td><b>Escola</b></td><td><b>Pontuação</b></td></tr>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$e=$row['email'];
$s=$row['score'];
$q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error231');
while($row=mysqli_fetch_array($q12) )
{
$name=$row['name'];
$gender=$row['gender'];
$college=$row['college'];
}
$c++;
echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$college.'</td><td>'.$s.'</td><td>';
}
echo '</table></div>';}

?>


<!--home closed-->
<!--users start-->
<?php if(@$_GET['q']==1) {

$result = mysqli_query($con,"SELECT * FROM user") or die('Error');
echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b>N.</b></td><td><b>Nome</b></td><td><b>Gênero</b></td><td><b>Escola</b></td><td><b>E-mail</b></td><td><b>Número de celular</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$mob = $row['mob'];
	$gender = $row['gender'];
    $email = $row['email'];
	$college = $row['college'];

	echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$college.'</td><td>'.$email.'</td><td>'.$mob.'</td>
	<td><a title="Delete User" href="update.php?demail='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
}
$c=0;
echo '</table></div>';

}?>
<!--user end-->

<!--feedback start-->
<?php if(@$_GET['q']==3) {
$result = mysqli_query($con,"SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC") or die('Error');
echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b>N.</b></td><td><b>Assunto</b></td><td><b>E-mail</b></td><td><b>Data</b></td><td><b>Horário</b></td><td><b>Por</b></td><td></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$subject = $row['subject'];
	$name = $row['name'];
	$email = $row['email'];
	$id = $row['id'];
	 echo '<tr><td>'.$c++.'</td>';
	echo '<td><a title="Click to open feedback" href="dash.php?q=3&fid='.$id.'">'.$subject.'</a></td><td>'.$email.'</td><td>'.$date.'</td><td>'.$time.'</td><td>'.$name.'</td>
	<td><a title="Open Feedback" href="dash.php?q=3&fid='.$id.'"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
	echo '<td><a title="Delete Feedback" href="update.php?fdid='.$id.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>

	</tr>';
}
echo '</table></div>';
}
?>
<!--feedback closed-->

<!--feedback reading portion start-->
<?php if(@$_GET['fid']) {
echo '<br />';
$id=@$_GET['fid'];
$result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$subject = $row['subject'];
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$feedback = $row['feedback'];
	
echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$subject.'</b></h1>';
 echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATA:</b>&nbsp;'.$date.'</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Horário:</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;<b>Por:</b>&nbsp;'.$name.'</span><br />'.$feedback.'</div></div>';}
}?>
<!--Feedback reading portion closed-->

<!--add quiz start-->
<?php
if(@$_GET['q']==4 && !(@$_GET['step']) ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Adicionar Quiz</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Insira o título do questionário" class="form-control input-md" type="text">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Insira o número total de perguntas" class="form-control input-md" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <input id="right" name="right" placeholder="Insira o Número total de Alternativas" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong" placeholder="Insira pontos negativos na resposta errada" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
  <input id="time" name="time" placeholder="Insira o limite de tempo em minutos" class="form-control input-md" min="1" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="tag"></label>  
  <div class="col-md-12">
  <input id="tag" name="tag" placeholder="Crie uma #tag para a busca do Questionário" class="form-control input-md" type="text">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="desc"></label>  
  <div class="col-md-12">
  <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Escreva a descrição aqui..."></textarea>  
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Avançar" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?>
<!--add quiz end-->

<!--add quiz step2 start-->
<?php
if(@$_GET['q']==4 && (@$_GET['step'])==2 ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
<fieldset>
';
 
 for($i=1;$i<=@$_GET['n'];$i++)
 {
echo '<b>Questão número&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Escreva o número da questão '.$i.' aqui..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'1"></label>  
  <div class="col-md-12">
  <input id="'.$i.'1" name="'.$i.'1" placeholder="Digite a opção a" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'2"></label>  
  <div class="col-md-12">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="Digite a opção b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'3"></label>  
  <div class="col-md-12">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="Digite a opção c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'4"></label>  
  <div class="col-md-12">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="Digite a opção d" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Resposta correta</b>:<br />
<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Escolha a resposta correta " class="form-control input-md" >
   <option value="a">Selecione a resposta para a pergunta '.$i.'</option>
  <option value="a">opção a</option>
  <option value="b">opção b</option>
  <option value="c">opção c</option>
  <option value="d">opção d</option> </select><br /><br />'; 
 }
    
echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Avançar" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?><!--add quiz step 2 end-->
<?php
if (@$_GET['q'] == 7) { // Altere para a sessão 7

    // Conexão ao Banco de Dados
    include('dbConnection.php');

    // Exibindo o formulário de importação de questionários
    echo '
    <div class="row">
        <div class="col-md-6">
            <!-- Formulário de Upload de Excel -->
            <h2>Importar Questionário (Excel)</h2>
            <form action="import_excel.php" method="post" enctype="multipart/form-data">
                <label for="file">Escolha o arquivo Excel:</label>
                <input type="file" name="excel_file" id="file" accept=".xlsx, .xls" required>
                <br><br>
                <button type="submit" class="btn btn-primary">Importar Questionário</button>
            </form>
        </div>

        <!-- Dropdown para Exportar Questionário -->
        <div class="col-md-6">
            <h2>Exportar Questionário</h2>
            <form action="export_questionnaire.php" method="post">
                <label for="questionnaire">Selecione um Questionário:</label>
                <select name="questionnaire" id="questionnaire" class="form-control" required>
                    <option value="">Escolha um questionário...</option>';

    // Buscar questionários disponíveis
    $query = "SELECT title FROM quiz"; // Ajuste o campo 'title' se necessário
    $result = mysqli_query($con, $query);

    // Preencher o dropdown com questionários
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . htmlspecialchars($row['title']) . '">' . htmlspecialchars($row['title']) . '</option>';
    }

    echo '      </select>
                <br>
                <button type="submit" class="btn btn-primary">Exportar Questionário</button>
            </form>
        </div>
    </div>

    <!-- Exemplo Explicativo, agora posicionado no final da página -->
    <div class="col-md-12 mt-4" style="max-width: 500px; margin: 20px auto; margin-bottom: 40px; left: 50%;">
        <div class="card" style="padding: 20px; border: 1px solid #ccc; background-color: #f9f9f9;">
            <h3>Exemplo de Importação</h3>
            <p>Formato: <strong>Título - Pergunta - A - B - C - D - Tempo (min) - Resposta Correta</strong></p>
            <p>Você precisa inserir essas informações para poder importar o questionário corretamente:</p>
            <ul style="list-style: none;">
                <li>
                    <strong>1. Insira o Título do Questionário:</strong> <br>
                    <span class="text-muted">Exemplo: "Geografia do Brasil"</span>
                </li>
                <li>
                    <strong>2. Insira o Número Total de Perguntas:</strong> <br>
                    <span class="text-muted">Exemplo: "10 perguntas"</span>
                </li>
                <li>
                    <strong>3. Insira o Número de Alternativas por Pergunta:</strong> <br>
                    <span class="text-muted">Exemplo: "4 alternativas"</span>
                </li>
                <li>
                    <strong>4. Insira a Pontuação Negativa para Respostas Erradas:</strong> <br>
                    <span class="text-muted">Exemplo: "-1 ponto por resposta errada"</span>
                </li>
                <li>
                    <strong>5. Insira o Limite de Tempo para o Questionário (em minutos):</strong> <br>
                    <span class="text-muted">Exemplo: "30 minutos"</span>
                </li>
            </ul>
            <p>Use o formato de arquivo Excel conforme o exemplo fornecido acima para garantir que o questionário seja importado corretamente.</p>
            <p><strong>Título - Pergunta - A - B - C - D - Tempo (min) - Resposta Correta</strong></p>
        </div>
    </div>';
}
?>



<!--remove quiz-->
<?php if(@$_GET['q']==5) {

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
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remover</b></span></a></b></td></tr>';
}
$c=0;
echo '</table></div>';

}
// Exibição do formulário para adicionar/editar notas
if (@$_GET['q'] == 6) {
  // Função para buscar todas as perguntas do banco
  function fetchAllQuestions($con) {
      $query = "SELECT qid, eid, qns FROM questions";
      $result = mysqli_query($con, $query);
      $questions = [];
      while ($row = mysqli_fetch_assoc($result)) {
          $questions[] = $row;
      }
      return $questions;
  }

  // Buscar perguntas ao carregar a página
  $allQuestions = fetchAllQuestions($con);

  if (isset($_POST['add_note'])) {
      $eid = $_POST['eid'];  // Pegando o `eid` da pergunta selecionada
      $qid = $_POST['qid'];  // Pegando o `qid` completo da pergunta selecionada
      $note_content = $_POST['note_content'];

      // Inserir ou atualizar a nota no banco de dados
      $query = "INSERT INTO notes (eid, qid, note) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE note = ?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("ssss", $eid, $qid, $note_content, $note_content);  // Garantindo que o `qid` completo seja enviado

      if ($stmt->execute()) {
          echo "Nota adicionada/atualizada com sucesso!";
      } else {
          echo "Erro ao adicionar/atualizar a nota: " . $stmt->error;
      }
  }

  echo '
  <div class="panel" style="max-width: 500px; margin: auto;">
      <h2 style="text-align: center;">Adicionar/Editar Notas</h2>
      <form method="post" action="dash.php?q=6">
          <div style="margin-bottom: 15px;">
              <label>Perguntas:</label>
              <div id="dropdown" style="position: relative;">
                  <button type="button" id="dropdownButton" style="width: 100%; text-align: left; padding: 10px;">Selecione uma pergunta</button>
                  <ul id="dropdownMenu" style="display: none; position: absolute; width: 100%; background: white; border: 1px solid #ccc; max-height: 200px; overflow-y: auto; z-index: 10;">
                      <li data-value="">Selecione uma pergunta</li>';

  // Exibir todas as perguntas no dropdown customizado
  foreach ($allQuestions as $question) {
      echo '<li data-qid="' . htmlspecialchars($question['qid']) . '" data-eid="' . htmlspecialchars($question['eid']) . '" style="padding: 10px; cursor: pointer; white-space: pre-wrap;">' . htmlspecialchars($question['qns']) . '</li>';
  }

  echo '</ul>
          <input type="hidden" name="qid" id="selectedQid" value=""> <!-- Para armazenar o qid selecionado -->
          <input type="hidden" name="eid" id="selectedEid" value=""> <!-- Para armazenar o eid selecionado -->
      </div>
  </div>

  <div style="margin-bottom: 15px;">
      <label for="note_content" style="display: block; margin-bottom: 5px;">Nota:</label>
      <textarea name="note_content" id="note_content" rows="4" cols="50" required style="width: 100%;"></textarea>
  </div>

  <input type="submit" name="add_note" value="Salvar Nota" style="width: 100%; padding: 10px; background-color: #245682; color: white; border: none; border-radius: 3px; cursor: pointer;">
</form>

<div>
  <h3>Pergunta Selecionada:</h3>
  <div id="selectedQuestion" style="border: 1px solid #ccc; padding: 10px; margin-top: 10px;"></div>
</div>

</div>'; 


  ?>


<script>
// Função para mostrar o dropdown
document.getElementById("dropdownButton").addEventListener("click", function() {
  var dropdownMenu = document.getElementById("dropdownMenu");
  dropdownMenu.style.display = dropdownMenu.style.display === "none" ? "block" : "none";
});

// Função para selecionar a pergunta
var items = document.querySelectorAll("#dropdownMenu li");
items.forEach(function(item) {
  item.addEventListener("click", function() {
      var selectedQuestion = item.innerText;
      var selectedQid = item.getAttribute("data-qid");  // Pegando o QID completo
      var selectedEid = item.getAttribute("data-eid");
      document.getElementById("selectedQid").value = selectedQid;  // Armazena o QID completo
      document.getElementById("selectedEid").value = selectedEid;  // Armazena o EID
      document.getElementById("dropdownButton").innerText = selectedQuestion;  // Atualiza o botão com a pergunta selecionada
      document.getElementById("selectedQuestion").innerText = selectedQuestion;  // Exibe a pergunta selecionada
      document.getElementById("dropdownMenu").style.display = "none";  // Fecha o dropdown
  });
});

// Fecha o dropdown se clicar fora
window.addEventListener('click', function(event) {
  if (!event.target.matches('#dropdownButton')) {
      var dropdownMenu = document.getElementById("dropdownMenu");
      if (dropdownMenu.style.display === "block") {
          dropdownMenu.style.display = "none";
      }
  }
});
</script>

<?php } ?>



</div><!--container closed-->
</div></div>
</body>
</html>
