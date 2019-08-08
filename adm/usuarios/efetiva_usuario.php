<?php 

require_once("../../classes/AutenticaLogin.php");
require_once("classes/Usuario.php");

@$Login = $_POST["login"];
@$Senha = $_POST["senha"];
@$Funcao = $_GET["funcao"];

$Usr = new Usuario();

if ($Funcao == "EXCLUIR")
{
    $Usr->excluir($Login);
    
    if ($Usr->getErro() == null)
    {
        echo "O usuário ".$Login." foi excluido com sucesso!";
    } else {
        echo "Error ao excluir o usuário: " . $Usr->getErro();
    }
}
else
{
    if ($Funcao == "INCLUIR")
    {
        $Usr->incluir($Login, $Senha);
    }
    else
    {
        $Usr->alterar($Login, $Senha);
    }

    if ($Usr->getErro() == null)
    {
        echo "O usuário ".$Login." foi efetivado com sucesso!";
    } 
    else 
    {
        echo "Error ao efetivar o usuário: " . $Usr->getErro();
    }
}

?>