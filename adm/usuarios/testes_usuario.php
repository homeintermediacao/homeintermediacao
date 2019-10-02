<?php

require_once("../../classes/AutenticaLogin.php");
require_once("classes/Usuario.php");

// Inclindo
$Usr = new Usuario;
echo "Incluindo usuario<br>";
$Usr->incluir("brmengo","senha123");
if ($Usr->getErro() == null)
{
    echo "Usuario incluido com sucesso <br><br>";
}
else
{
    echo "Erro ao incluir usuario: ". $Usr->getErro()."<br><br>";
}

//Consultando
echo "Consultando usuario brmengo <br>";
$Resultado = $Usr->consultar("brmengo");

for ($i = (count($Resultado)-1);$i >= 1; $i--)
{
    echo "Login=".$Resultado[$i]->getLogin()."<br>";
    echo "Senha=".$Resultado[$i]->getSenha()."<br>";
}

//Alterando
echo "<br>Alterando o usuario brmengo<br>";
$Usr->alterar("brmengo","senha4321");

if ($Usr->getErro() == null)
{
    echo "Usuario alterado com sucesso <br><br>";
}
else
{
    echo "Erro ao alterar usuario: ". $Usr->getErro()."<br><br>";
}

//Consultando
echo "Consultando usuario brmengo <br>";
$Resultado = $Usr->consultar("brmengo");

for ($i = (count($Resultado)-1);$i >= 1; $i--)
{
    echo "Login=".$Resultado[$i]->getLogin()."<br>";
    echo "Senha=".$Resultado[$i]->getSenha()."<br>";
}

//Excluindo
echo "<br>Excluindo o usuario brmengo<br>";
$Usr->excluir("brmengo");

if ($Usr->getErro() == null)
{
    echo "Usuario excluido com sucesso <br><br>";
}
else
{
    echo "Erro ao excluir usuario: ". $Usr->getErro()."<br><br>";
}


//Consultando todos os usuarios
echo "Consultando usuario brmengo <br>";
$Resultado = $Usr->consultar("brmengo");

if (count($Resultado)-1 == 0)
{
    echo "Usuario brmengo não localizado.";
}
else
{
    for ($i = (count($Resultado)-1);$i >= 1; $i--)
    {
        echo "Login=".$Resultado[$i]->getLogin()."<br>";
        echo "Senha=".$Resultado[$i]->getSenha()."<br>";
    }
}

?>