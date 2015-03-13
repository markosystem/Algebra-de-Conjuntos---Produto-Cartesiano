<?php
/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 06/03/2015
 * Time: 14:13
 */
require "classes/file.php";
if(isset($_POST)){
    $instancia = new file();
    if(!isset($_POST['Verificar'])){
        $msg = $instancia->moveFiles($_FILES['inputFiles']);
    }else{
        $files = $instancia->loadingFilesDirectorios("E:/xampp/htdocs/Algebra-de-Conjuntos---Produto-Cartesiano/files");
        $filePrincipal = $files[0]["Estrutura"];
        $filesComplementares = "";
        $i = 1;
        while($i < count($files)){
            $filesComplementares[] = $files[$i]["Estrutura"];

            $i++;
        }
        $newFile = "";
        foreach($filePrincipal as $k => $file){
            $newFile[] .= $file ." ". $filesComplementares[0][0]." ".$filesComplementares[1][0];
            $newFile[] .= $file ." ". $filesComplementares[0][0]." ".$filesComplementares[1][1];

            $newFile[] .= $file ." ". $filesComplementares[0][1]." ".$filesComplementares[1][0];
            $newFile[] .= $file ." ". $filesComplementares[0][1]." ".$filesComplementares[1][1];
        }

        $instancia->writeFile("output/","pc.txt",$newFile);
        $msg = "Arquivo saida gerado com sucesso";
    }
    if(isset($msg)){
        header("location:/Algebra-de-Conjuntos---Produto-Cartesiano?msg=".$msg);
    }else{
        header("location:/Algebra-de-Conjuntos---Produto-Cartesiano");
    }
}else{
    echo "Necessita de uma requisicao POST";
}