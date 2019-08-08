<?php

require_once("../../classes/AutenticaLogin.php");
require_once("classes/Noticia.php");

@$Id = $_GET["id"];
@$Funcao = $_GET["funcao"];

if ($Id > 0)
{
    $Noti = new Noticia_DAO;
    $Noticia = $Noti->consultar($Id);

    $Titulo = $Noticia[1]->getTitulo();
    $Resumo = $Noticia[1]->getResumo();
    $Imagem = $Noticia[1]->getImagem();
    $Fonte_Nome = $Noticia[1]->getFonte_nome();
    $Fonte_URL = $Noticia[1]->getFonte_url();
}
?>

<html>
    <body>
        <div style="width:400px; border:1px solid;">
            <form enctype="multipart/form-data" name="noticias" method="POST" onsubmit="return validaFuncao('<?php echo @$Funcao; ?>')" action="publica_noticia.php?funcao=<?php echo @$Funcao; ?>">
                <input type="hidden" id="hId" name="hId" value="<?php echo $Id; ?>">
                <input type="hidden" id="caminho_imagem" name="caminho_imagem" value="<?php echo $Imagem; ?>">
                <table width=100%>
                    <tr>
                        <td>Imagem:</td>
                        <td><input type="file" id="imagem" name="imagem" value="<?php echo @$Imagem; ?>"></td>
                    </tr>
                    <tr>
                        <td>Titulo:</td>
                        <td><input type="text" id="titulo" name="titulo" value="<?php echo @$Titulo; ?>"></td>
                    </tr>
                    <tr>
                        <td>Fonte Nome:</td>
                        <td><input type="text" id="fonte_nome" name="fonte_nome" value="<?php echo @$Fonte_Nome; ?>"></td>
                    </tr>
                    <tr>
                        <td>Fonte URL:</td>
                        <td><input type="text" id="fonte_url" name="fonte_url" value="<?php echo @$Fonte_URL; ?>"></td>
                    </tr>
                    <tr>
                        <td>Resumo:</td>
                        <td><textarea id="resumo" name="resumo"><?php echo @$Resumo; ?></textarea></td>
                    </tr>
                    <tr>
                    <?php
                        switch ($Funcao)
                        {
                            case "INCLUIR":
                                echo '<td><input type="submit" id="btPublicar" value="Publicar"></td>';
                                break;
                            case "ALTERAR":
                                echo '<td><input type="submit" id="btPublicar" value="Alterar"></td>';
                                break;
                            case "EXCLUIR":
                                echo '<td><input type="submit" id="btPublicar" value="Excluir"></td>';
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
        return confirm("Confirma a exclusão desta noticia?");
    }
}

</script>