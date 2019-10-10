<?php


class Config_BD
{
    if (strtoupper($_SERVER["HTTP_HOST"]) == "LOCALHOST")
    {
        //Desenvolvimento
        public $serverBanco = "localhost";
        public $nomeBanco = "homeDB";
        public $usrBanco = "root";
        public $pwsBanco = "";
    }
    else
    {
        //Produção
        public $usrBanco = 'home';
        public $pwsBanco = 'mida@1985';
        public $nomeBanco = 'dbhome';
        public $serverBanco = 'dbhome.mysql.uhserver.com';
    }
}

class Config_IMG
{
    //Config de diretorio
    public function getCaminhoArqTmp()
    {
        if (strtoupper($_SERVER["HTTP_HOST"]) == "LOCALHOST")
        {
            return $_SERVER["DOCUMENT_ROOT"]."/homeintermediacao/adm/noticias/tmp/";
        }
        else
        {
            return $_SERVER["DOCUMENT_ROOT"]."/adm/noticias/tmp/";
        }
    }

    public function getCaminhoArq()
    {
        if (strtoupper($_SERVER["HTTP_HOST"]) == "LOCALHOST")
        {
            return "/homeintermediacao/adm/noticias/tmp/";
        }
        else
        {
            return "/adm/noticias/tmp/";
        }
    }
}
?>