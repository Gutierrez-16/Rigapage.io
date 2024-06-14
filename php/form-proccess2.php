<?php 
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$header = "From: " . $email . "\r\n";
$header .= "Reply-To: " . $email . "\r\n";


$message = "Este mensaje fue enviado por: " . $name . "\r\n";
$message = "Mensaje: " . $_POST['message'];


$EmailTo = "josel.sanchez@upsjb.edu.pe";
$EmailSubject = "New Message Received";

mail($EmailTo,$EmailSubject , utf8_decode($message),$header);

header("Location:index.html")
?>