<?php 

include_once("../../config/config.php");

class Conexao
{
    
    private $conn;

    public function Conexao($abrirConexao)
    {
        if ($abrirConexao)
        {
            $this->abrirConexao();
        }
    }

    public function conector()
    {
        return $this->conn;
    }

    public function abrirConexao()
    {
        $config = new Config_BD();

        $this->conn = mysqli_connect($config->serverBanco, $config->usrBanco, $config->pwsBanco, $config->nomeBanco);

        if (!$this->conn) {
            die("Falha de conexao: " . mysqli_connect_error());
        }
    }

    public function fecharConexao()
    {
        mysqli_close($this->conn);
    }

    public function executaQuery($Query)
    {
        if ($this->conn) 
        {
            return mysqli_query($this->conn, $Query);
        }
        else
        {
            echo "Sem conexão com o banco de dados.";
        }
    }

    public function executaComando($Comando)
    {
        if ($this->conn) 
        {
            return mysqli_query($this->conn, $Comando) or die(false);
        }
        else
        {
            echo "Sem conexão com o banco de dados.";
        }
    }

}

?>