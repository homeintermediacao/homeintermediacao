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

<link rel="stylesheet" href="../../assets/css/estilo_form.css" />

<body>
        <div class="divMaster">
        <div class="divForm">
            <form name="usuarios" method="POST" onsubmit="return validaFuncao('<?php echo @$Funcao; ?>')" action="efetiva_usuario.php?funcao=<?php echo @$Funcao; ?>">
                <table class="sTable">
                    <tr>
                        <td>Login:</td>
                        <?php 
                            if ($Funcao == "INCLUIR")
                            {
                                echo '<td><input type="text" id="login" name="login" maxlength="20" value="'.$Login.'"></td>';
                            }
                            else
                            {
                                echo '<td><input type="text" readonly id="login" name="login" value="'.$Login.'"></td>';
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>Senha:</td>
                        <td><input type="password" id="senha" name="senha" maxlength="15" value="<?php echo @$Senha; ?>"></td>
                    </tr>
                    <tr>
                    <?php
                        switch ($Funcao)
                        {
                            case "INCLUIR":
                                echo '<td><input type="submit" id="btEfetivar" value="Incluir">';
                                echo " <input type='button' id='btVoltar' value='Voltar' onclick=' window.location.href=\"../menu.php\"'></td>";
                                break;
                            case "ALTERAR":
                                echo '<td><input type="submit" id="btEfetivar" value="Alterar">';
                                echo " <input type='button' id='btVoltar' value='Voltar' onclick=' window.location.href=\"consultar_usuarios.php\"'></td>";
                                break;
                            case "EXCLUIR":
                                echo '<td><input type="submit" id="btEfetivar" value="Excluir">';
                                echo " <input type='button' id='btVoltar' value='Voltar' onclick=' window.location.href=\"consultar_usuarios.php\"'></td>";
                                break;
                        }
                    ?>
                    </tr>
                </table>
            </form>
        </div>
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