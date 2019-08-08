<?php

require_once("../../classes/AutenticaLogin.php");
require_once("classes/Usuario.php");

@$Login = $_GET["login"];
@$Funcao = $_GET["funcao"];

if ($Login != "")
{
    $Usr = new Usuario();
    $usuario = $Usr->consultar($Login);
    $Senha = $usuario[1]->getSenha();
}
?>

<html>
    <body>
        <div style="width:400px; border:1px solid;">
            <form name="usuarios" method="POST" onsubmit="return validaFuncao('<?php echo @$Funcao; ?>')" action="efetiva_usuario.php?funcao=<?php echo @$Funcao; ?>">
                <table width=100%>
                    <tr>
                        <td>Login:</td>
                        <?php 
                            if ($Funcao == "INCLUIR")
                            {
                                echo '<td><input type="text" id="login" name="login" value="'.$Login.'"></td>';
                            }
                            else
                            {
                                echo '<td><input type="text" readonly id="login" name="login" value="'.$Login.'"></td>';
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>Senha:</td>
                        <td><input type="text" id="senha" name="senha" value="<?php echo @$Senha; ?>"></td>
                    </tr>
                    <tr>
                    <?php
                        switch ($Funcao)
                        {
                            case "INCLUIR":
                                echo '<td><input type="submit" id="btEfetivar" value="Incluir"></td>';
                                break;
                            case "ALTERAR":
                                echo '<td><input type="submit" id="btEfetivar" value="Alterar"></td>';
                                break;
                            case "EXCLUIR":
                                echo '<td><input type="submit" id="btEfetivar" value="Excluir"></td>';
                                break;
                        }
                    ?>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

<script>

function validaFuncao(funcao)
{
    if (funcao == "EXCLUIR")
    {
        return confirm("Confirma a exclusão do usuário <?php echo @$Login; ?>?");
    }
}

</script>