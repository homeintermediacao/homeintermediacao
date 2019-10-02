<html>

<link rel="stylesheet" href="../../assets/css/estilo_form.css" />

<body>
        <div class="divMaster">
        <div class="divForm">
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
    echo "<p>Usuário <b><font color=#c70f06>".$Login."</font></b> autenticado!!!</p>";
    echo "<a href='logon.php?acao=SAIR'>Trocar de usuário</a><br>"; 
    echo "<a href='../menu.php'>Ir para o Menu</a>";
}
else
{
    echo "Usuário ou senha invalidos!";
}


?>

</div>
        </div>
    </body>
</html>