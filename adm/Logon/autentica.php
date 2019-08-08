<?php

require_once("../usuarios/classes/Usuario.php");

$Login = $_POST["login"];
$Senha = $_POST["senha"];

$Usr = new Usuario();
$retorno = $Usr->Autenticar($Login, $Senha);

if ($retorno->num_rows == 1)
{
    session_start();
    $_SESSION["LOGIN"] = $Login;
    $_SESSION["AUTENTICADO"] = true;
    echo "Usuário <b>".$Login."</b> autenticado!!!<br><br>";
    echo "Trocar de usuário, clique <a href='logon.php?acao=SAIR'>AQUI</a><br>"; 
    echo "Ir para o Menu, clique <a href='../menu.php'>AQUI</a>";
}
else
{
    echo "Usuário ou senha invalidos!";
}


?>