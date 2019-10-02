<html>

<link rel="stylesheet" href="../../assets/css/estilo_form.css" />

<body>
        <div class="divMaster">
        <div class="divForm">

<?php 
ini_set('memory_limit', '1024M');

if (strtoupper($_SERVER["HTTP_HOST"]) == "LOCALHOST")
{
    require_once($_SERVER["DOCUMENT_ROOT"]."/homeintermediacao/classes/AutenticaLogin.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/homeintermediacao/config/config.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/homeintermediacao/adm/noticias/classes/Imagem.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/homeintermediacao/adm/noticias/classes/Noticia.php");
}
else
{
    require_once($_SERVER["DOCUMENT_ROOT"]."/classes/AutenticaLogin.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/config/config.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/adm/noticias/classes/Imagem.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/adm/noticias/classes/Noticia.php");
}

@$Id = $_POST["hId"];
@$Funcao = $_GET["funcao"];
@$titulo = $_POST['titulo'];
@$resumo = $_POST['resumo'];
@$imagem = $_POST['caminho_imagem'];
@$fonte_nome = $_POST['fonte_nome'];
@$fonte_url = $_POST['fonte_url'];

$dataHora = date('Y-m-d H:i:s');
$Noti = new Noticia_DAO;
$conf_img = new Config_IMG();

if ($Funcao == "INCLUIR" || $Funcao == "ALTERAR")
{
    if ($_FILES["imagem"]["name"] != "")
    {
        $imagem = md5($_FILES["imagem"]["tmp_name"].$dataHora);

        
        $extensaoArq = ".".pathinfo($_FILES["imagem"]["name"], PATHINFO_EXTENSION);
        $uploadfile = $conf_img->getCaminhoArqTmp().$imagem.'tmp'.$extensaoArq;
        $imagem_final = $conf_img->getCaminhoArqTmp().$imagem.$extensaoArq;

        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $uploadfile)) {

            //redimensiona a imagem
            $img = new Imagem();
            $img->redimensionar($uploadfile, $imagem_final, $extensaoArq);

            if ($Funcao == "INCLUIR")
            {
                $Noti->incluir($titulo, $resumo, $imagem.$extensaoArq, $fonte_nome, $fonte_url);
            }
            else
            {
                $Noti->alterar($Id, $titulo, $resumo, $imagem.$extensaoArq, $fonte_nome, $fonte_url);
            }

            if ($Noti->Erro == null)
            {
                echo "A notícia ".$Noti->Id." foi publicada com sucesso!";
            } else {
                echo "Error ao publicar a notícia: " . $Noti->getErro();
                $conf_img = new Config_IMG();
                unlink($imagem_final);
            }

            unlink($uploadfile);
        }
        else 
        {
            if ($_FILES['imagem']['error'] == 1)
            {
                echo "A imagem supera o tamanho maximo permitido.<br>";
                echo "Por favor, reduza o tamanho da imagem e tente novamente.";
            }
            else
            {
                echo "Erro no upload da imagem\n";
            }
        }
    }
    else
    {
        if ($Funcao == "ALTERAR")
        {
            $Noti->alterar($Id, $titulo, $resumo, null, $fonte_nome, $fonte_url);

            if ($Noti->getErro() == null)
            {
                echo "A notícia ".$Id." foi publicada com sucesso!";
            } else {
                echo "Error ao publicar a notícia: " . $Noti->getErro();
            }
        }
    }
}
else
{
    if ($Funcao == "EXCLUIR")
    {
        $Imagem = new Imagem();
        $Noti->excluir($Id);
        
        if ($Noti->getErro() == null)
        {
            $Imagem->excluir($conf_img->getCaminhoArqTmp().$imagem);
            echo "A notícia ".$Id." foi excluida com sucesso!";
        } else {
            echo "Error ao excluir a notícia: " . $Noti->getErro();
        }
    }
}

echo "<br><br>Retornar para o <a href='../menu.php'>MENU</a>";

?>

</div>
    </div>
    </body>
</html>