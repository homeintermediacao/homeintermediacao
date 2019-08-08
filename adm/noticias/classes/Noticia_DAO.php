<?php

require_once("../../classes/Conexao.php");

class Noticia_DAO
{
    public $Id;
    public $Erro;

    public function getErro()
    {
        return $this->Erro;
    }

    public function consultar($Id = null, $Titulo = null, $Resumo = null, $Total_registros = null)
    {
        $Not[] = array();

        $conexao = new Conexao(true);
        $Query = "Select * from tbNoticias";
        
        if ($Id != null || $Titulo != null || $Resumo != null)
        {
            $Query = $Query . " Where ";

            if ($Id != null)
            {
                $Query = $Query . "id = ".$Id." and ";
            }

            if ($Titulo != null)
            {
                $Query = $Query . "titulo like '%".$Titulo."%' and ";
            }

            if ($Resumo != null)
            {
                $Query = $Query . "resumo like '%".$Resumo."%' and ";
            }

            $Query = substr($Query, 0, -5);
        }

        if ($Total_registros != null)
        {
            $Query = $Query . " limit ". $Total_registros;
        }

        $Resultado = $conexao->executaQuery($Query);
        $this->Erro = mysqli_error($conexao->conector());
        while ($row = mysqli_fetch_assoc($Resultado)) 
        { 
            $noticia = new Noticia();
            $noticia->setId($row['id']);
            $noticia->setTitulo($row['titulo']);
            $noticia->setResumo($row['resumo']);
            $noticia->setImagem($row['imagem']);
            $noticia->setFonte_nome($row['fonte_nome']);
            $noticia->setFonte_url($row['fonte_url']);
            $noticia->setDataHoraGravacao($row['dataHoraGravacao']);

            $Not[] = $noticia;
        }

        $conexao->fecharConexao();

        return $Not;
    }

    
    public function incluir($Titulo, $Resumo, $Imagem, $Fonte_nome, $Fonte_url)
    {
        $conexao = new Conexao(true);

        $Comando = "INSERT INTO tbNoticias (titulo, resumo, imagem, fonte_nome, fonte_url, dataHoraGravacao) 
         VALUES ('$Titulo','$Resumo','$Imagem','$Fonte_nome', '$Fonte_url', now())";
        
        $conexao->executaComando($Comando);
        $this->Erro = mysqli_error($conexao->conector());
        $this->Id = $conexao->conector()->insert_id;
        
        $conexao->fecharConexao();
    }

    public function alterar($Id, $Titulo, $Resumo, $Imagem = null, $Fonte_nome, $Fonte_url)
    {
        $conexao = new Conexao(true);

        $Comando = "UPDATE tbNoticias 
                    Set titulo='".$Titulo."', resumo='".$Resumo."',
                        fonte_nome='".$Fonte_nome."', fonte_url='".$Fonte_url."', dataHoraGravacao= now()";

        if ($Imagem != null)
        {
            $Comando = $Comando . ", imagem='".$Imagem."'";
        }
        
        $Comando = $Comando . " WHERE Id=".$Id;

        $conexao->executaComando($Comando);
        $this->Erro = mysqli_error($conexao->conector());

        $conexao->fecharConexao();
    }

    public function excluir($Id)
    {
        $conexao = new Conexao(true);

        $Comando = "DELETE FROM tbNoticias WHERE Id =".$Id;

        $conexao->executaComando($Comando);
        $this->Erro = mysqli_error($conexao->conector());
        
        $conexao->fecharConexao();
    }
}

?>