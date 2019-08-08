<html>
    <body>
<?php

require_once("../../classes/AutenticaLogin.php");
require_once("classes/Noticia.php");

@$Id = $_POST["tId"];
@$Titulo = $_POST["tTitulo"];
@$Resumo = $_POST["tResumo"];

?>
    <form name="form1" action="consultar_noticias.php" method="POST">
        <table>
        <tr><td>ID</td><td><input type="text" name="tId" value="<?php echo $Id; ?>"></td></tr>
        <tr><td>Titulo</td><td><input type="text" name="tTitulo" value="<?php echo $Titulo; ?>"></td></tr>
        <tr><td>Resumo</td><td><input type="text" name="tResumo" value="<?php echo $Resumo; ?>"></td></tr>
        <tr><td><input type="submit" value="Filtrar"></td></tr>
        </table>
    </form>

    <table border=1>
<?php

$Noti = new Noticia_DAO;
$Noticias = $Noti->consultar($Id, $Titulo, $Resumo, 10);

for ($i = (count($Noticias)-1);$i >= 1; $i--)
{
    $fonte_url = $Noticias[$i]->getFonte_url();

    if ((strtoupper(substr($fonte_url,0,5)) != "HTTPS") && (strtoupper(substr($fonte_url,0,4)) != "HTTP"))
    {
        $fonte_url = "https://".$fonte_url;
    }

    echo "<tr>";
    echo "  <td><a href='".$fonte_url."'>".$Noticias[$i]->getId()."</a></td>";
    echo "  <td><a href='".$fonte_url."'><img src='".$Noticias[$i]->getImagem()."'></a></td>";
    echo "  <td><a href='".$fonte_url."'>".$Noticias[$i]->getTitulo()."</a><br>";
    echo          $Noticias[$i]->getResumo()."</td>";
    echo "  <td><a href='gerenciar_noticias.php?id=".$Noticias[$i]->getId()."&funcao=EXCLUIR'>Excluir</a><br>";
    echo "      <a href='gerenciar_noticias.php?id=".$Noticias[$i]->getId()."&funcao=ALTERAR'>Alterar</a></td>";
    echo "</tr>";
}

?>

        </table>
    </body>
</html>