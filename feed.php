<?php
include_once 'dbConnection.php';

$ref = @$_GET['q'];
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$id = uniqid();

// Configurar a data e hora para o formato brasileiro (dd/mm/aaaa) e GMT-3 (Horário de Brasília)
$date = new DateTime('now', new DateTimeZone('GMT-3'));
$formatted_date = $date->format('Y-m-d'); // Formato da data ajustado para dd/mm/aaaa
$time = $date->format('H:i:s'); 

$feedback = $_POST['feedback'];

// Capturar o username do usuário logado
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = 'Anônimo'; // Se o usuário não estiver logado, insere como 'Anônimo'
}

// Atualizando o comando INSERT para incluir o username
$q = mysqli_query($con, "INSERT INTO feedback (id, name, email, subject, feedback, date, time, username) VALUES ('$id', '$name', '$email', '$subject', '$feedback', '$formatted_date', '$time', '$username')") or die("Error: " . mysqli_error($con));

header("location:$ref?q=Obrigado pelo seu valioso feedback");

?>
