<?php
/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 06/03/2015
 * Time: 11:49
 */

class file {
    var $conjunto;
    function moveFiles($arquivos){
        try{
            $files = self::loadingFilesDirectorios("files/");
            $filesOutput = self::loadingFilesDirectorios("output/","output");
            foreach($files as $f){
                if(file_exists("E:/xampp/htdocs/Algebra-de-Conjuntos---Produto-Cartesiano/files/".$f['Nome'])){
                    unlink("E:/xampp/htdocs/Algebra-de-Conjuntos---Produto-Cartesiano/files/".$f['Nome']);
                }
            }
            foreach($filesOutput as $f){
                if(file_exists("E:/xampp/htdocs/Algebra-de-Conjuntos---Produto-Cartesiano/output/".$f['Nome'])){
                    unlink("E:/xampp/htdocs/Algebra-de-Conjuntos---Produto-Cartesiano/output/".$f['Nome']);
                }
            }
           $location = 'E:/xampp/htdocs/Algebra-de-Conjuntos---Produto-Cartesiano/files/';
           foreach($arquivos['tmp_name'] as $k => $file){
               if(!move_uploaded_file($file, $location."palavras".($k+1).".txt")){
                    print_r("Houve um erro ao mover o arquivo");
                    exit;
                }
           }
            return "Arquivo movidos com sucesso!";
        }catch (Exception $e){
            exit($e->getMessage());
        }
    }
    function loadingFile($nomeArquivo, $tipo, $caminho = null, $conjunto = null){
        try{
            if($caminho == null){
                $arquivo = fopen("E:/xampp/htdocs/Algebra-de-Conjuntos---Produto-Cartesiano/files/$nomeArquivo","r");
            }else{
                $arquivo = fopen("E:/xampp/htdocs/Algebra-de-Conjuntos---Produto-Cartesiano/$caminho/$nomeArquivo","r");
            }
            if($tipo == "r"){
                if ($arquivo == false) die('Não foi possível abrir o arquivo.');
                while(true) {
                    $linha = fgets($arquivo);
                    if ($linha==null){
                        break;
                    }
                    $conjunto[] = str_replace("\r\n","",$linha);
                }
                fclose($arquivo);
                return $conjunto;
            }elseif($tipo == "w+"){
                $arquivo = fopen("E:/xampp/htdocs/Algebra-de-Conjuntos---Produto-Cartesiano/files/$nomeArquivo",$tipo);
                if (!fwrite($arquivo, ' ')) die('Nao foi possIvel atualizar o arquivo.');
                fclose($arquivo);
            }

        }catch (Exception $e){
            exit($e->getMessage());
        }
    }
    function loadingFilesDirectorios($caminho, $diferect = null){
        $diretorio = dir($caminho);
        $files = array();
        $c = 0;
        while($arquivo = $diretorio->read()){
            if($arquivo != "." && $arquivo != ".."){
                $conteudo = $diferect == null ? self::readingFile($arquivo):self::readingFile($arquivo,$diferect);
                $files[$c] = ["Nome"=>$arquivo, "Caminho"=>$caminho,"Conteudo"=>$conteudo,"Estrutura"=>self::loadingFile($arquivo,"r",$diferect)];
                $c++;
            }
        }
        $diretorio->close();
        return $files;
    }
    function readingFile($nomeArquivo, $caminho = null){
        if($caminho == null){
            $arquivo = fopen("E:/xampp/htdocs/Algebra-de-Conjuntos---Produto-Cartesiano/files/$nomeArquivo","r");
        }else{
            $arquivo = fopen("E:/xampp/htdocs/Algebra-de-Conjuntos---Produto-Cartesiano/$caminho/$nomeArquivo","r");
        }

        if ($arquivo == false) die('Não foi possível abrir o arquivo.');
        $line = "";
        while(true) {
            $linha = fgets($arquivo);
            if ($linha==null){
                break;
            }
            $line .= $linha;
        }
        return $line;
    }
    function writeFile($caminho, $arquivo, $valores){
        try{
            if(file_exists("E:/xampp/htdocs/Algebra-de-Conjuntos---Produto-Cartesiano/$caminho/$arquivo")){
                unlink("E:/xampp/htdocs/Algebra-de-Conjuntos---Produto-Cartesiano/$caminho/$arquivo");
            }
            $fp = fopen("E:/xampp/htdocs/Algebra-de-Conjuntos---Produto-Cartesiano/$caminho/$arquivo","a");
            foreach($valores as $v){
                $conteudo = $v."\r\n";
                fwrite($fp, $conteudo);
            }
            fclose($fp);
        }catch (Exception $erro){
            exit($erro->getMessage());
        }
    }
    function writeText($caminho, $arquivo, $texto){
        if(file_exists("E:/xampp/htdocs/Algebra-de-Conjuntos---Produto-Cartesiano/$caminho/$arquivo")){
            unlink("E:/xampp/htdocs/Algebra-de-Conjuntos---Produto-Cartesiano/$caminho/$arquivo");
        }
        $fp = fopen("E:/xampp/htdocs/Algebra-de-Conjuntos---Produto-Cartesiano/$caminho/$arquivo","a");

        $conteudo = $texto;
        fwrite($fp, $conteudo);

        fclose($fp);
    }
}