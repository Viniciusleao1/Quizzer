<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Quiz de Perguntas || Viniciusleao1</title>
  
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>  
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<?php
if (@$_GET['w']) {
    echo '<script>alert("' . @$_GET['w'] . '");</script>';
}
?>
</head>

<body>
<div class="row header">
<div class="col-lg-6">
<span class="logo">Quiz de Perguntas</span></div>
<div class="col-md-2">
</div>
<div class="col-md-4">
<?php
include_once 'dbConnection.php';
session_start();
if ((!isset($_SESSION['username']))) {
    echo '<a href="#" class="pull-right logb btn btn-primary" data-toggle="modal" data-target="#myModal" style="color:white"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;<font style="font-size:12px;font-weight:bold">Login</font></a>&nbsp;';
} else {
    echo '<a href="logout.php?q=feedback.php" class="pull-right logb btn btn-primary" style="color:white"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;<font style="font-size:12px;font-weight:bold">Sair</font></a>&nbsp;';
}
?>

<a href="index.php" class="pull-right btn logb btn-primary" style="color:white"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;<font style="font-size:12px;font-weight:bold">Inicio</font></a>&nbsp;
</div></div>
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1"><span style="color:darkblue;font-size:12px;font-weight:bold">Faça login na sua conta</span></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="login.php?q=index.php" method="POST">
<fieldset>
<div class="form-group">
  <label class="col-md-3 control-label" for="username"></label>  
  <div class="col-md-6">
  <input id="username" name="username" placeholder="Digite seu nome de usuário" class="form-control input-md" type="username">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input id="password" name="password" placeholder="Digite sua senha" class="form-control input-md" type="password">
    
  </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Login</button>
    </fieldset>
</form>
      </div>
    </div>
  </div>
</div>
<div class="bg1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6 panel" style="background-image:url(image/bg1.jpg); min-height:430px;">
<h2 align="center" style="font-family:'typo'; color:#000066">FEEDBACK</h2>
<div style="font-size:14px;margin-top:20px"><br />
<?php
if (@$_GET['q'])
    echo '<span style="font-size:18px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;' . @$_GET['q'] . '</span>';
else {
    echo ' 

<form role="form"  method="post" action="feed.php?q=feedback.php">
<div class="row">
<div class="col-md-3"><b>Nome:</b><br /><br /><br /><b>Assunto:</b></div>
<div class="col-md-9">
<!-- Text input-->
<div class="form-group">
  <input id="name" name="name" placeholder="Digite seu nome" class="form-control input-md" type="text"><br />    
   <input id="name" name="subject" placeholder="Insira uma breve descrição do seu feedback" class="form-control input-md" type="text">    

</div>
</div>
</div><!--End of row-->

<div class="row">
<div class="col-md-3"><b>E-Mail ID:</b></div>
<div class="col-md-9">
<!-- Text input-->
<div class="form-group">
  <input id="email" name="email" placeholder="Digite seu e-mail" class="form-control input-md" type="email">    
 </div>
</div>
</div><!--End of row-->

<div class="form-group"> 
<textarea rows="5" cols="8" name="feedback" class="form-control" placeholder="Escreva comentários aqui. Mantenha-o limpo e simples."></textarea>
</div>
<div class="form-group" align="center">
<font style="font-size:12px;font-weight:bold"><input type="submit" name="submit" value="Enviar meu feedback" class="btn btn-primary" /></font>
</div>
</form>';
}
?>
</div>
<div class="col-md-3"></div></div>
</div></div>
</div>
<div class="row footer">
  <div class="col-md-2 box"></div>
<div class="col-md-6 box">
<span href="#" data-target="#login" style="color:lightyellow">Desenvolvido por viniciusleao1, Quer dar um FORK?, EM BREVE<br><br></span></div>
<div class="col-md-2 box">
<span href="feedback.php" style="color:lightyellow;text-decoration:underline" onmouseover="this.style('color:yellow')">Feedback</span></div>
<div class="col-md-2 box">
<a href="about.php" s style="color:lightyellow;text-decoration:underline" onmouseover="this.style('color:yellow')">Sobre</a></div>
</div>
</body>
</html>
