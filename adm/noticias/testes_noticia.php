<html>

<link rel="stylesheet" href="../../assets/css/estilo_form.css" />

<body>
        <div class="divMaster">
        <div class="divForm">
        
<?php

require_once("../../classes/AutenticaLogin.php");
require_once("classes/Noticia.php");

// Inclindo noticia
$Noti = new Noticia_DAO;
echo "Incluindo noticia<br>";
$Noti->incluir("Titulo","Resumo","imagem","Fonte nome", "Fonte url");
$Id_gerado = $Noti->Id;
echo "Noticia inserida com Id = ".$Id_gerado."<br><br>";

//Consultando noticia
echo "Consultando Noticia com Id ".$Id_gerado."<br>";
$Resultado = $Noti->consultar($Id_gerado);

for ($i = (count($Resultado)-1);$i >= 1; $i--)
{
    echo "Id=".$Resultado[$i]->getId()."<br>";
    echo "Titulo=".$Resultado[$i]->getTitulo()."<br>";
    echo "Resumo=".$Resultado[$i]->getResumo()."<br>";
    echo "DataHoraGravacao=".$Resultado[$i]->getDataHoraGravacao()."<br>";
}

//Alterando a noticia
echo "<br>Alterando a noticia com Id ".$Id_gerado."<br>";
$Noti->alterar($Id_gerado,"Titulo2","Resumo2","imagem2","Fonte nome2", "Fonte url2");
echo "Noticia alterada.<br><br>";

//Consultando noticia
echo "Consultando Noticia com Id ".$Id_gerado."<br>";
$Resultado = $Noti->consultar(null,"2");

for ($i = (count($Resultado)-1);$i >= 1; $i--)
{
    echo "Id=".$Resultado[$i]->getId()."<br>";
    echo "Titulo=".$Resultado[$i]->getTitulo()."<br>";
    echo "Resumo=".$Resultado[$i]->getResumo()."<br>";
    echo "DataHoraGravacao=".$Resultado[$i]->getDataHoraGravacao()."<br>";
}

//Excluindo a noticia
echo "<br>Excluindo a noticia com Id ".$Id_gerado."<br>";
$Noti->excluir($Id_gerado);
echo "Noticia excluida.<br><br>";

//Consultando noticia
echo "Consultando Noticia com Id ".$Id_gerado."<br>";
$Resultado = $Noti->consultar($Id_gerado);

if (count($Resultado)-1 == 0)
{
    echo "Noticia com Id ".$Id_gerado." não localizada.";
}
else
{
    for ($i = (count($Resultado)-1);$i >= 1; $i--)
    {
        echo "Id=".$Resultado[$i]->getId()."<br>";
        echo "Titulo=".$Resultado[$i]->getTitulo()."<br>";
        echo "Resumo=".$Resultado[$i]->getResumo()."<br>";
        echo "DataHoraGravacao=".$Resultado[$i]->getDataHoraGravacao()."<br>";
    }
}

?>


</div>
    </div>
    </body>
</html>
