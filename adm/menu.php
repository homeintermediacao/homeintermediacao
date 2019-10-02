<?php
require_once("../classes/AutenticaLogin.php");
?>

<html>

<link rel="stylesheet" href="../assets/css/estilo_form.css" />

<body>
        <div class="divMaster">
        <div class="divForm">
        <table class="sTable">
            <tr>
                <td colspan=2>Usuários</td>
            </tr>
            <tr>
                <td width="5px"></td>
                <td><a href="usuarios/gerenciar_usuarios.php?funcao=INCLUIR">Incluir<a></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="usuarios/consultar_usuarios.php">Consultar<a></td>
            </tr>

            <tr>
                <td colspan=2><br>Noticias</td>
            </tr>
            <tr>
                <td></td>
                <td><a href="noticias/gerenciar_noticias.php?funcao=INCLUIR">Incluir<a></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="noticias/consultar_noticias.php">Consultar<a></td>
            </tr>

            <tr>
                <td colspan=2><br><a href='Logon/logon.php?acao=SAIR'>Fazer Logoff</a></td>
            </tr>
        </table>
    </div>
    </div>
    </body>
</html>