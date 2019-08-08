<?php 
ini_set('memory_limit', '1024M');

require_once("../../classes/AutenticaLogin.php");
require_once("../../config/config.php");
require_once("classes/Imagem.php");
require_once("classes/Noticia.php");

@$Id = $_POST["hId"];
@$Funcao = $_GET["funcao"];
@$titulo = $_POST['titulo'];
@$resumo = $_POST['resumo'];
@$imagem = $_POST['caminho_imagem'];
@$fonte_nome = $_POST['fonte_nome'];
@$fonte_url = $_POST['fonte_url'];

$dataHora = date('Y-m-d H:i:s');
$Noti = new Noticia_DAO;
if ($Funcao == "INCLUIR" || $Funcao == "ALTERAR")
{
    if ($_FILES["imagem"]["name"] != "")
    {
        $imagem = md5($_FILES["imagem"]["tmp_name"].$dataHora);

        $conf_img = new Config_IMG();
        $extensaoArq = pathinfo($_FILES["imagem"]["name"], PATHINFO_EXTENSION);
        $uploadfile = $conf_img->caminhoArqTmp.$imagem.'tmp'.$extensaoArq;
        $imagem_final = $conf_img->caminhoArqTmp.$imagem.".".$extensaoArq;

        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $uploadfile)) {

            //redimensiona a imagem
            $img = new Imagem();
            $img->redimensionar($uploadfile, $imagem_final, $extensaoArq);

            if ($Funcao == "INCLUIR")
            {
                $Noti->incluir($titulo, $resumo, $imagem_final, $fonte_nome, $fonte_url);
            }
            else
            {
                $Noti->alterar($Id, $titulo, $resumo, $imagem_final, $fonte_nome, $fonte_url);
            }

            if ($Noti->Erro == null)
            {
                echo "A notícia ".$Noti->Id." foi publicada com sucesso!";
            } else {
                echo "Error ao publicar a notícia: " . $Noti->getErro();
                $conf_img = new Config_IMG();
                unlink($conf_img->caminhoArqTmp.$imagem.".".$extensaoArq);
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
            $Imagem->excluir($imagem);
            echo "A notícia ".$Id." foi excluida com sucesso!";
        } else {
            echo "Error ao excluir a notícia: " . $Noti->getErro();
        }
    }
}

?>