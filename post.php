<?php
session_start();	
$name = $_GET['name'];
$email = $_GET['email'];
$message = $_GET['message'];
$subject = '[Mensagem do site], de ' . $name;
if(strtolower($_REQUEST['code']) == strtolower($_SESSION['random_number']))
{
	$TO = "contato@homeintermediacao.com.br";
	$h = "From: " . $email;
	$content = "$name ($email) enviou uma nova mensagem :\n\n$message";
	mail($TO, $subject, $content, $h);		
	echo 1;		
}	
else
{
	echo 0; // invalid code
}
?>