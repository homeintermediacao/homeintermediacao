<?php


class Config_BD
{
    //Produção
    public $usrBanco = 'home';
    public $pwsBanco = 'mida@1985';
    public $nomeBanco = 'dbhome';
    public $serverBanco = 'dbhome.mysql.uhserver.com';

    //Desenvolvimento
    // public $serverBanco = "localhost";
    // public $nomeBanco = "homeDB";
    // public $usrBanco = "root";
    // public $pwsBanco = "";

}

class Config_IMG
{
    //Config de diretorio
    public function getCaminhoArqTmp()
    {
        return $_SERVER["DOCUMENT_ROOT"]."/homeintermediacao/adm/noticias/tmp/";
    }

    public function getCaminhoArq()
    {
        return "/homeintermediacao/adm/noticias/tmp/";
    }
}
?>