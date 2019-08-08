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
        echo "Usuario <b>".$Login."</b> está logado.<br>";
        echo "Trocar de usuário, clique <a href='logon.php?acao=SAIR'>AQUI</a><br>"; 
        echo "Ir para o Menu, clique <a href='../menu.php'>AQUI</a>";
        die;  
    }
}
?>

<html>
    <body>
        <form id="formLogon" method="POST" action="autentica.php">
            <table>
                <tr>
                    <td>Usuário</td>
                    <td><input type="text" name="login"></td>
                </tr>
                <tr>
                    <td>Senha</td>
                    <td><input type="password" name="senha"></td>
                </tr>
                <tr>
                    <td colspan=2><input type="submit" name="bAutentica" value="Entrar"></td>
                </tr>
            </table>
        </form>
    </body>
</html>