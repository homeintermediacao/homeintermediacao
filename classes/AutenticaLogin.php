<?php

session_start();
@$Login = $_SESSION["LOGIN"];
@$Autenticado = $_SESSION["AUTENTICADO"];

if (!$Autenticado)
{
        header("Location: /homeintermediacao/adm/Logon/logon.php");
}

?>