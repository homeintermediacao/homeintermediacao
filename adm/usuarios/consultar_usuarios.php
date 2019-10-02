<html>

<link rel="stylesheet" href="../../assets/css/estilo_form.css" />

<body>
        <div class="divMaster">
        <div class="divForm">

<?php

require_once("../../classes/AutenticaLogin.php");
require_once("classes/Usuario.php");

@$Login = $_POST["login"];
@$Senha = $_POST["senha"];

?>
    <form name="form1" action="consultar_usuarios.php" method="POST">
        <table class="sTable">
        <tr><td>Login</td><td><input type="text" name="login" value="<?php echo $Login; ?>"></td></tr>
        <tr><td><input type="submit" value="Filtrar"> 
        <input type="button" id="btVoltar" value="Voltar" onclick=" window.location.href='../menu.php'"></td>
        </tr>
        </table>
    </form>
    <br>
    <table border="0" style="border-collapse: collapse; margin: 0 auto">
<?php

$Usr = new Usuario();
$usuarios = $Usr->consultar($Login, 10);

for ($i = (count($usuarios)-1);$i >= 1; $i--)
{

    echo "<tr>";
    echo "  <td class='bdDown'><font size='6'>".$usuarios[$i]->getLogin()."</font></td>";
    echo "  <td class='bdDown'><a href='gerenciar_usuarios.php?login=".$usuarios[$i]->getLogin()."&funcao=EXCLUIR'>Excluir</a><br>";
    echo "      <a href='gerenciar_usuarios.php?login=".$usuarios[$i]->getLogin()."&funcao=ALTERAR'>Alterar</a></td>";
    echo "</tr>";
}

?>

        </table>
</div>
    </div>
    </body>
</html>