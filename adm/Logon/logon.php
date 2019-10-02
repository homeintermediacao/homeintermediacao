<html>

<link rel="stylesheet" href="../../assets/css/estilo_form.css" />

<body>
        <div class="divMaster">
        <div class="divForm">
<?php

session_start();
@$Login = $_SESSION["LOGIN"];
@$Autenticado = $_SESSION["AUTENTICADO"];

if ($Autenticado)
{
    if (@$_GET["acao"] == "SAIR")
    {
        @session_start();
        unset($_SESSION["LOGIN"]);
        unset($_SESSION["AUTENTICADO"]);
        header("Location: logon.php");
    }
    else
    {
        echo "<p>Você esta autenticado com o usuário <b><font color=#c70f06>".$Login."</font></b></p>";
        echo "<a href='logon.php?acao=SAIR'>Trocar de usuário</a><br>"; 
        echo "<a href='../menu.php'>Ir para o Menu</a>";
        die;  
    }
}
?>
        <form id="formLogon" method="POST" action="autentica.php">
            <table>
                <tr>
                    <td>Usuário</td>
                    <td><input type="text" class="sText" name="login"></td>
                </tr>
                <tr>
                    <td>Senha</td>
                    <td><input type="password" class="sText" name="senha"></td>
                </tr>
                <tr>
                    <td colspan=2><input type="submit" class="sButton" name="bAutentica" value="Entrar"></td>
                </tr>
            </table>
        </form>
        </div>
        </div>
    </body>
</html>