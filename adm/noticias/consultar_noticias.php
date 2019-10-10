<html>

<link rel="stylesheet" href="../../assets/css/estilo_form.css" />

<body>
        <div class="divMaster">
        <div class="divForm">
<?php

if (strtoupper($_SERVER["HTTP_HOST"]) == "LOCALHOST")
{
    require_once($_SERVER["DOCUMENT_ROOT"]."/homeintermediacao/classes/AutenticaLogin.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/homeintermediacao/config/config.php");
}
else
{
    require_once($_SERVER["DOCUMENT_ROOT"]."/classes/AutenticaLogin.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/config/config.php");
}

require_once("classes/Noticia.php");

@$Id = $_POST["tId"];
@$Titulo = $_POST["tTitulo"];
@$Resumo = $_POST["tResumo"];

?>
    <form name="form1" action="consultar_noticias.php" method="POST">
        <table class="sTable">
        <tr><td>ID</td><td><input type="text" name="tId" value="<?php echo $Id; ?>"></td></tr>
        <tr><td>Titulo</td><td><input type="text" name="tTitulo" value="<?php echo $Titulo; ?>"></td></tr>
        <tr><td>Resumo</td><td><input type="text" name="tResumo" value="<?php echo $Resumo; ?>"></td></tr>
        <tr><td><input type="submit" value="Filtrar"> 
        <input type="button" id="btVoltar" value="Voltar" onclick=" window.location.href='../menu.php'"></td>
        </tr>
        </table>
    </form>
    <br>
    <table border="0" style="border-collapse: collapse">
<?php

$Noti = new Noticia_DAO;
$config = new Config_IMG();

$Noticias = $Noti->consultar($Id, $Titulo, $Resumo, 10);

for ($i = (count($Noticias)-1);$i >= 1; $i--)
{
    $fonte_url = $Noticias[$i]->getFonte_url();

    if ((strtoupper(substr($fonte_url,0,5)) != "HTTPS") && (strtoupper(substr($fonte_url,0,4)) != "HTTP"))
    {
        $fonte_url = "https://".$fonte_url;
    }

    echo "<tr>";
    echo "  <td class='bdDown'><a href='".$fonte_url."'><img width='100px' src='".$config->getCaminhoArq().$Noticias[$i]->getImagem()."'></a></td>";
    echo "  <td class='bdDown'><a href='".$fonte_url."'>".$Noticias[$i]->getTitulo()."</a><br>";
    echo          $Noticias[$i]->getResumo()."</td>";
    echo "  <td class='bdDown'><a href='gerenciar_noticias.php?id=".$Noticias[$i]->getId()."&funcao=EXCLUIR'>Excluir</a><br>";
    echo "      <a href='gerenciar_noticias.php?id=".$Noticias[$i]->getId()."&funcao=ALTERAR'>Alterar</a></td>";
    echo "</tr>";
}

?>

        </table>
    </div>
    </div>
    </body>
</html>