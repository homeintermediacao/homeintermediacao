<html>

<link rel="stylesheet" href="../../assets/css/estilo_form.css" />

<body>
        <div class="divMaster">
        <div class="divForm">

<?php 

if (strtoupper($_SERVER["HTTP_HOST"]) == "LOCALHOST")
{
    require_once($_SERVER["DOCUMENT_ROOT"]."/homeintermediacao/classes/AutenticaLogin.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/homeintermediacao/adm/usuarios/classes/Usuario.php");
}
else
{
    require_once($_SERVER["DOCUMENT_ROOT"]."/classes/AutenticaLogin.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/adm/usuarios/classes/Usuario.php");
}

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

echo "<br><br>Retornar para o <a href='../menu.php'>MENU</a>";

?>

</div>
    </div>
    </body>
</html>