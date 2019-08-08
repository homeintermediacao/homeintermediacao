<html>
    <body>
<?php

require_once("../../classes/AutenticaLogin.php");
require_once("classes/Usuario.php");

@$Login = $_POST["login"];
@$Senha = $_POST["senha"];

?>
    <form name="form1" action="consultar_usuarios.php" method="POST">
        <table>
        <tr><td>Login</td><td><input type="text" name="login" value="<?php echo $Login; ?>"></td></tr>
        <tr><td><input type="submit" value="Filtrar"></td></tr>
        </table>
    </form>

    <table border=1>
<?php

$Usr = new Usuario();
$usuarios = $Usr->consultar($Login, 10);

for ($i = (count($usuarios)-1);$i >= 1; $i--)
{

    echo "<tr>";
    echo "  <td>".$usuarios[$i]->getLogin()."</td>";
    echo "  <td><a href='gerenciar_usuarios.php?login=".$usuarios[$i]->getLogin()."&funcao=EXCLUIR'>Excluir</a><br>";
    echo "      <a href='gerenciar_usuarios.php?login=".$usuarios[$i]->getLogin()."&funcao=ALTERAR'>Alterar</a></td>";
    echo "</tr>";
}

?>

        </table>
    </body>
</html>