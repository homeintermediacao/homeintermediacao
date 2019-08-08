<?php

class Imagem
{
    public function redimensionar($imagem_original, $nome_destino, $tipo)
    {
        list($largura, $altura,$Tipo) = getimagesize($imagem_original);

        //$proporcao = 0.2;
        //$nova_largura = $largura * $proporcao;
        //$nova_altura = $altura * $proporcao;
        $nova_largura = 200;
        $nova_altura = 200;
        $nova_imagem = imagecreatetruecolor($nova_largura, $nova_altura);

        switch (strtoupper($tipo))
        {
            case "GIF":
                $imagem = imagecreatefromgif($imagem_original);
                imagecopyresampled(
                    $nova_imagem,
                    $imagem,
                    0, 
                    0, 
                    0, 
                    0, 
                    $nova_largura,
                    $nova_altura, 
                    $largura, 
                    $altura
                );
                
                imagegif($nova_imagem, $nome_destino, 100 );
                break;
            case "JPG":
                $imagem = imagecreatefromjpeg($imagem_original);
                imagecopyresampled(
                    $nova_imagem,
                    $imagem,
                    0, 
                    0, 
                    0, 
                    0, 
                    $nova_largura,
                    $nova_altura, 
                    $largura, 
                    $altura
                );
                
                imagejpeg($nova_imagem, $nome_destino, 100 );
                break;
            case "JPEG":
                $imagem = imagecreatefromjpeg($imagem_original);
                imagecopyresampled(
                    $nova_imagem,
                    $imagem,
                    0, 
                    0, 
                    0, 
                    0, 
                    $nova_largura,
                    $nova_altura, 
                    $largura, 
                    $altura
                );
                
                imagejpeg($nova_imagem, $nome_destino, 100 );
                break;
            case "PNG":
                $imagem = imagecreatefrompng($imagem_original);
                imagecopyresampled(
                    $nova_imagem,
                    $imagem,
                    0, 
                    0, 
                    0, 
                    0, 
                    $nova_largura,
                    $nova_altura, 
                    $largura, 
                    $altura
                );
                
                imagepng($nova_imagem, $nome_destino, 9 );
                break;
            case "BMP":
                $imagem = imagecreatefrombmp($imagem_original);
                imagecopyresampled(
                    $nova_imagem,
                    $imagem,
                    0, 
                    0, 
                    0, 
                    0, 
                    $nova_largura,
                    $nova_altura, 
                    $largura, 
                    $altura
                );
                
                imagebmp($nova_imagem, $nome_destino, 100 );
                break;
        }

        imagedestroy($imagem);
        imagedestroy($nova_imagem);
    }

    public function excluir($Imagem)
    {
        unlink($Imagem);
    }
}


?>