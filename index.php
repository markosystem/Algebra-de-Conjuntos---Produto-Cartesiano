<html>
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ripples.min.css" rel="stylesheet">
    <link href="css/material-wfont.min.css" rel="stylesheet">
</head>
<style>
p{
    text-align: justify;
}
</style>
<body style="background-color: white;">
<div class="container">
    <h1>Álgebra de Conjuntos - Produto Cartesiano</h1>
    <blockquote>
        <p style="text-align: justify;">
            A operação produto cartesiano é uma operação binária que, quando aplicada a dois conjuntos A e B resulta em um conjunto constituído de sequências de duas componentes (tuplas), sendo que a primeira componente de cada sequência é um elemento de A, e a segunda componente, um elemento de B.
            Uma sequência de n componentes, denominada n-upla ordenada, consiste de n objetos (não necessariamente distintos) em uma ordem fixa. Por exemplo, uma 2-upla ordenada é denominada par ordenado. Um par ordenado no qual a primeira componente é x e a segunda é y é definido como ⟨x,y⟩.
        </p>
    </blockquote>
    <div class="list-group">
        <?php
            require "classes/file.php";
            $instancia = new file();
            $files = $instancia->loadingFilesDirectorios("files/");
            $filesOutput = $instancia->loadingFilesDirectorios("output/", "output");
        ?>
        <div class="col-lg-12">
            <p style="text-align: justify;">
                <small>Exercício 2.8:
                    Crie um programa que lê n arquivos de entrada. Cada arquivo contém uma palavra em cada linha. O programa deve ler os arquivos e gerar um arquivo de saída chamado pc.txt contendo o produto cartesiano entre as palavras dos arquivos de entrada. Cada linha do arquivo de saída deve representar um elemento do produto cartesiano (uma n-upla) cujos componentes devem estar separados por um espaço [em branco].
            </p>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-8">
                    <h2>Arquivos de Entrada</h2>
                </div>
                <div class="col-lg-4">
                    <small>
                        <form method="post" action="result.php" enctype="multipart/form-data">
                        <input type="text" readonly="" class="form-control floating-label" placeholder="Carregar Arquivos...">
                        <input type="file" name="inputFiles[]" id="inputFiles" multiple="" required="" accept=".txt,.csv">
                        <input class="btn btn-sm btn-primary" type="submit" value="Enviar">
                        </form>
                    </small>
                </div>
            </div>
            <?php if(count($files) == 0): ?>
                <div class="list-group-item">
                    <div class="row-action-primary">
                        <i class="mdi-notification-dnd-forwardslash"></i>
                    </div>
                    <div class="row-content">
                        <h4 class="list-group-item-heading">Não há arquivos no Diretório.</h4>
                    </div>
                </div>
            <?php else: ?>
                <form action="result.php" method="post" id="formPrincipal2">
                    <?php foreach($files as $f): ?>
                        <div class="list-group-item">
                            <div class="row-action-primary">
                                <i class="mdi-action-description"></i>
                            </div>
                            <div class="row-content">
                                <h4 class="list-group-item-heading"><b>Conteúdo</b><br/>
                                    <?php foreach($f['Estrutura'] as $a): ?>
                                        <?= "<i>".$a."</i><br/>" ?>
                                    <?php endforeach; ?>
                                </h4>
                                <p class="list-group-item-text"><b>Link:</b> <a href="<?= $f['Caminho'].$f['Nome'] ?>" target="_blank"><?= $f['Nome'] ?></a></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <input type="button" class="btn btn-primary" id="btnVerificar" value="Verificar" />
                    <input type="hidden" name="Verificar" id="inputVerificar">
                </form>
                <div class="list-group-separator"></div>
            <?php endif; ?>
        </div>
        <div class="col-lg-6">
            <h2>Arquivo de Saída(Output)</h2>
            <?php if(count($filesOutput) == 0): ?>
                <div class="list-group-item">
                    <div class="row-action-primary">
                        <i class="mdi-notification-dnd-forwardslash"></i>
                    </div>
                    <div class="row-content">
                        <h4 class="list-group-item-heading">Não há arquivos no Diretório.</h4>
                    </div>
                </div>
            <?php else: ?>
                <?php foreach($filesOutput as $f): ?>
                    <div class="list-group-item">
                        <div class="row-action-primary">
                            <i class="mdi-action-description"></i>
                        </div>
                        <div class="row-content">
                            <h4 class="list-group-item-heading"><b>Conteúdo</b><br/>
                                <?php foreach($f['Estrutura'] as $a): ?>
                                    <?= "<i>".$a."</i><br/>" ?>
                                <?php endforeach; ?>
                            </h4>
                            <p class="list-group-item-text"><b>Link:</b> <a href="<?= $f['Caminho'].$f['Nome'] ?>" target="_blank"><?= $f['Nome'] ?></a></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<div id="source-modal" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Linguagem PHP</h4>
                <p style="text-align: justify;">
                    <small>Exercício 2.2: Algumas linguagens de programação possuem estruturas de dados para conjuntos, as quais disponibilizam, também, operações sobre estes. Faça uma pesquisa sobre linguagens de programação e, selecionando uma linguagem de programação que suporte definição de conjuntos e operações sobre eles, apresente exemplos, contemplando as operações e propriedades vistas até o momento (e.g. pertiência, contingência, união e intersecção).</small>
                </p>
            </div>
            <div class="modal-body">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pertinência</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            Utilize a função <code>in_array($char, $conjunto1)</code>, onde é verificado se um elemento está contido em um conjunto. Retornar um bool.
                        </p>
                        <pre>$existe = in_array($elemento, $file);<code style="color:#15c000;">//Verifica se o elemento está contido e guarda um true ou false na variavel $existe.</code>
if($existe){
    $instancia->writeText("output","output.txt", "O Elemento ".$elemento." está contido no Conjunto ".$arquivo);<code style="color:#15c000;">//Realiza a escrita no arquivo de saída.</code>
}else{
    $instancia->writeText("output","output.txt", "O Elemento ".$elemento." NÃO está contido no Conjunto ".$arquivo);<code style="color:#15c000;">//Realiza a escrita no arquivo de saída.</code>
}</pre>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Contingência</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            Utilize a função <code>array_diff($conjunto1, $conjunto2)</code> o qual analisará as diferenças entre os conjuntos
                        </p>
                        <pre>$result1 = array_diff($file_2,$file_1);<code style="color:#15c000;">//Compara os elementos entre os conjuntos e retorna aqueles que estão no $file_1 que não estão no $file_2</code>
$result2 = array_diff($file_1,$file_2);<code style="color:#15c000;">//Compara os elementos entre os conjuntos e retorna aqueles que estão no $file_2 que não estão no $file_1</code>

if(empty($result2) && count($result1) > 0){<code style="color:#15c000;">//Verifica se é subconjunto próprio</code>
    $instancia->writeText("output","output.txt", "O Conjunto ".$arquivo1." é SubConjunto próprio do Conjunto ".$arquivo2);
}else{
    if(empty($result2) && empty($result1)){<code style="color:#15c000;">//Verifica se é subconjunto(igualdade)</code>
        $instancia->writeText("output","output.txt", "O Conjunto ".$arquivo1." é SubConjunto do Conjunto ".$arquivo2);
    }else{
        $instancia->writeText("output","output.txt", "O Conjunto ".$arquivo1." NÃO é SubConjunto do Conjunto ".$arquivo2);
    }
}</pre>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">União</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            Utilize a função <code>array_merge($conjunto1, $conjunto2)</code>,
                            a qual funde os 2 conjuntos e os elementos do segundo conjunto é colocado no final do array que será retornado.
                            Foi necessário utilizar a função <code>array_unique($param)</code> que elimina todos os elementos repetidos.
                        </p>
                        <pre>$result = array_unique(array_merge($file1, $file2));<code style="color:#15c000;">//Funde os dois conjuntos.</code><br/>$instancia->writeFile("output","output.txt",$result);<code style="color:#15c000;">//Realiza a escrita no arquivo de saída.</code></pre>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Intersecção</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            Utilize a função <code>array_uintersect($conjunto1, $conjunto2, $callback)</code>, a qual computação a interseção de array, comparando dados com uma função callback.
                            A função callback <code>"strcasecmp"</code> é necessária para a comparação de strings sem diferenciar maiúsculas e minúsculas.
                        </p>
                        <pre>$result = array_uintersect($file1, $file2,"strcasecmp");<code style="color:#15c000;">//Intersecção entre os Conjuntos retornando a variavel $result.</code><br/>$instancia->writeFile("output","output.txt",$result);<code style="color:#15c000;">//Realiza a escrita no arquivo de saída.</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(isset($_GET['msg'])): ?>
<div id="source-modal5" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Informação</h4>
            </div>
            <div class="modal-body">
                <h3><?= $_GET['msg'] ?></h3>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<div id="source-modal6" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Informações</h4>
            </div>
            <div class="modal-body">
                <b>Disciplina:</b><br/>
                Matemática Discreta - 2015/1 (CEULP/ULBRA)<br/><br/>
                <b>Professor Msc:</b><br/>Jackson Gomes<br/><br/>

                <b>Alunos:</b><br/>
                Gabriel Aires<br/>
                Gleyson Moura<br/>
                Jayanderson Soares<br/>
                Luiz Carlos<br/>
                Lucas Roese<br/>
                Marcos Batista<br/>
                Octavio Franceschetto<br/>
                Rafael Fonseca<br/>
                Silas Gonçalves<br/>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/ripples.min.js"></script>
<script src="js/material.min.js"></script>
<script>
    $(document).ready(function () {
        $.material.init();
        $("#btnVerificar").click(function(){
            $("#inputVerificar").val("Sim");
            $("#formPrincipal2").submit();
        });
    });
    <?php if(isset($_GET['msg'])): ?>
        $("#source-modal5").modal();
    <?php endif; ?>
</script>
</body>
</html>
