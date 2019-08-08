<?php

require_once("Usuario_DAO.php");

class Usuario
{
    private $Login;
    private $Senha;
    private $Erro;
    private $Autenticado;

    public function getErro()
    {
        return $this->Erro;
    }

    public function setLogin($login)
    {
        $this->Login = $login;
    }

    public function getLogin()
    {
        return $this->Login;
    }

    public function setSenha($senha)
    {
        $this->Senha = $senha;
    }

    public function getSenha()
    {
        return $this->Senha;
    }

    public function setAutenticado($status)
    {
        $this->Autenticado = $status;
    }

    public function getAutenticado()
    {
        return $this->Autenticado;
    }

    public function Consultar($login = null)
    {
        $Usr = new Usuario_DAO();
        $resultado = $Usr->Consultar($login);
        $this->Erro = $Usr->getErro();

        return $resultado;
    }

    public function Incluir($login, $senha)
    {
        $Usr = new Usuario_DAO();
        $resultado = $Usr->Incluir($login, $senha);
        $this->Erro = $Usr->getErro();

        return $resultado;
    }

    public function Alterar($login, $senha)
    {
        $Usr = new Usuario_DAO();
        $resultado = $Usr->Alterar($login, $senha);
        $this->Erro = $Usr->getErro();

        return $resultado;
    }

    public function Excluir($login)
    {
        $Usr = new Usuario_DAO();
        $resultado = $Usr->Excluir($login);
        $this->Erro = $Usr->getErro();

        return $resultado;
    }

    public function Autenticar($login, $senha)
    {
        $Usr = new Usuario_DAO();
        $resultado = $Usr->ValidaLogin($login, $senha);
        $this->Erro = $Usr->getErro();

        return $resultado;
    }
}


?>