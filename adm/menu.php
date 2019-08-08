<?php
require_once("../classes/AutenticaLogin.php");
?>

<html>
    <body>
        <table>
            <tr>
                <td colspan=2>Usuários</td>
            </tr>
            <tr>
                <td><a href="usuarios/gerenciar_usuarios.php?funcao=INCLUIR">Incluir<a></td>
                <td><a href="usuarios/consultar_usuarios.php">Consultar<a></td>
            </tr>

            <tr>
                <td colspan=2>Noticias</td>
            </tr>
            <tr>
                <td><a href="noticias/gerenciar_noticias.php?funcao=INCLUIR">Incluir<a></td>
                <td><a href="noticias/consultar_noticias.php">Consultar<a></td>
            </tr>
        </table>
    </body>
</html>