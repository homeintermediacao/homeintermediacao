<?php

require_once("../../classes/Conexao.php");

class Usuario_DAO
{
    public $Erro;

    public function getErro()
    {
        return $this->Erro;
    }

    public function consultar($login = null, $Total_registros = null)
    {
        $Usr[] = array();

        $conexao = new Conexao(true);
        $Query = "Select * from tbUsuarios";
        
        if ($login != null)
        {
            $Query = $Query . " Where login like '%".$login."%'";
        }

        if ($Total_registros != null)
        {
            $Query = $Query . " limit ". $Total_registros;
        }

        $Resultado = $conexao->executaQuery($Query);
        $this->Erro = mysqli_error($conexao->conector());
        while ($row = mysqli_fetch_assoc($Resultado)) 
        { 
            $usuario = new Usuario();
            $usuario->setLogin($row['login']);
            $usuario->setSenha($row['senha']);

            $Usr[] = $usuario;
        }

        $conexao->fecharConexao();

        return $Usr;
    }

    
    public function incluir($login, $senha)
    {
        $conexao = new Conexao(true);

        $Comando = "INSERT INTO tbUsuarios (login, senha) 
         VALUES ('$login','$senha')";
        
        $conexao->executaComando($Comando);
        $this->Erro = mysqli_error($conexao->conector());
        
        $conexao->fecharConexao();
    }

    public function alterar($login, $senha)
    {
        $conexao = new Conexao(true);

        $Comando = "UPDATE tbUsuarios 
                    Set senha='".$senha."'
                    WHERE login='".$login."'";

        $conexao->executaComando($Comando);
        $this->Erro = mysqli_error($conexao->conector());

        $conexao->fecharConexao();
    }

    public function excluir($login)
    {
        $conexao = new Conexao(true);

        $Comando = "DELETE FROM tbUsuarios WHERE login ='".$login."'";

        $conexao->executaComando($Comando);
        $this->Erro = mysqli_error($conexao->conector());
        
        $conexao->fecharConexao();
    }

    public function ValidaLogin($login, $senha)
    {
        $conexao = new Conexao(true);
        $Query = "Select * from tbUsuarios
                  Where login = '".$login."'
                    and senha = '".$senha."'";

        $Resultado = $conexao->executaQuery($Query);
        $this->Erro = mysqli_error($conexao->conector());
        $conexao->fecharConexao();

        return $Resultado;

    }
}

?>