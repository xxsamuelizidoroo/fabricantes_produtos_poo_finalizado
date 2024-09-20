<?php
require_once "../vendor/autoload.php";

use CrudPoo\Produto;
use CrudDiversos\Utilitarios;

$produto = new Produto;

$listaDeProdutos = $produto->lerProdutos();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Lista </title>
</head>
<body>
    <div class="container">
        <h1>Produtos | SELECT</h1> 
        <a href="../index.php">HOME</a>
        <hr>
        <h2>Lendo e carregando todos os produtos</h2>
        <p><a href="inserir.php">Inserir um novo produto</a></p>
        <div class="podutos">
           <?php foreach($listaDeProdutos as $produto){ ?>
            <article>
                <h3><?=$produto['produto']?></h3>

                <p>Preço:
                <?=Utilitarios::trataMoeda($produto['preco'],2,",", ".")?></p>

                <p>Quantidade: <?=$produto['quantidade']?></p>
                <p>Descrição: <?=$produto['descricao']?></p>
                <p>Fabricante: <?=$produto['fabricante']?></p>
                <p>
                    <a href="atualizar.php?id=<?=$produto['id']?>" style="color:blue;">Atualizar</a> -
                    <a class="excluir" href="excluir.php?id=<?=$produto['id']?>" style="color:red;">Excluir</a>
                </p>
                <hr>
            </article>
           <?php }?>
        </div>
    </div>
<script src="../src/excluir.js"></script>
</body>
</html>