<?php

session_start();
@$Login = $_SESSION["LOGIN"];
@$Autenticado = $_SESSION["AUTENTICADO"];

if (!$Autenticado)
{
        if (strtoupper($_SERVER["HTTP_HOST"]) == "LOCALHOST")
        {
                header("Location: /homeintermediacao/adm/Logon/logon.php");
        }
        else
        {
                header("Location: /adm/Logon/logon.php");
        }
}

?>