<?php
session_start();	
$name = $_GET['name'];
$email = $_GET['email'];
$message = $_GET['message'];
$subject = '[Mensagem do site], de ' . $name;
if(strtolower($_REQUEST['code']) == strtolower($_SESSION['random_number']))
{
	$TO = "contato@homeintermediacao.com.br";
	$From = "From: site@homeintermediacao.com.br";
	$content = "$name ($email) enviou uma nova mensagem :\n\n$message";
	mail($TO, $subject, $content, $From);

	echo 1;		
}	
else
{
	echo 0; // invalid code
}
?>