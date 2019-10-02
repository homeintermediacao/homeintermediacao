<?php

require_once("Noticia_DAO.php");

class Noticia
{
    private $Id;
    private $Titulo;
    private $Resumo;
    private $Imagem;
    private $Fonte_nome;
    private $Fonte_url;
    private $DataHoraGravacao;
    private $Erro;

    public function getErro()
    {
        return $this->Erro;
    }

    public function setId($nId)
    {
        $this->Id = $nId;
    }

    public function getId()
    {
        return $this->Id;
    }

    public function setTitulo($sTitulo)
    {
        $this->Titulo = $sTitulo;
    }

    public function getTitulo()
    {
        return $this->Titulo;
    }

    public function setResumo($sResumo)
    {
        $this->Resumo = $sResumo;
    }

    public function getResumo()
    {
        return $this->Resumo;
    }

    public function setImagem($sImagem)
    {
        $this->Imagem = $sImagem;
    }

    public function getImagem()
    {
        return $this->Imagem;
    }

    public function setFonte_nome($sFonte_nome)
    {
        $this->Fonte_nome = $sFonte_nome;
    }

    public function getFonte_nome()
    {
        return $this->Fonte_nome;
    }

    public function setFonte_url($sFonte_url)
    {
        $this->Fonte_url = $sFonte_url;
    }

    public function getFonte_url()
    {
        return $this->Fonte_url;
    }

    public function setDataHoraGravacao($dDataHoraGravacao)
    {
        $this->DataHoraGravacao = $dDataHoraGravacao;
    }

    public function getDataHoraGravacao()
    {
        return $this->DataHoraGravacao;
    }

    public function consultar($Id = null, $Titulo = null, $Resumo = null, $Total_registros = null)
    {
        $noticia = new Noticia_DAO();
        $resultado = $noticia->consultar($Id, $Titulo, $Resumo, $Total_registros);
        $this->Erro = $noticia->getErro();

        return $resultado;
    }

    public function consultarFeed($Total_registros)
    {
        $noticia = new Noticia_DAO();
        $resultado = $noticia->consultar(null, null, null, $Total_registros, "DESC");
        $this->Erro = $noticia->getErro();

        return $resultado;
    }

    public function incluir($Titulo, $Resumo, $Imagem, $Fonte_nome, $Fonte_url)
    {
        $noticia = new Noticia_DAO();
        $resultado = $noticia->incluir($Titulo, $Resumo, $Imagem, $Fonte_nome, $Fonte_url);
        $this->Erro = $noticia->getErro();

        return $resultado;
    }

    public function alterar($Id, $Titulo, $Resumo, $Imagem = null, $Fonte_nome, $Fonte_url)
    {
        $noticia = new Noticia_DAO();
        $resultado = $noticia->alterar($Id, $Titulo, $Resumo, $Imagem, $Fonte_nome, $Fonte_url);
        $this->Erro = $noticia->getErro();

        return $resultado;
    }

    public function excluir($Id)
    {
        $noticia = new Noticia_DAO();
        $resultado = $noticia->excluir($Id);
        $this->Erro = $noticia->getErro();

        return $resultado;
    }
}

?>