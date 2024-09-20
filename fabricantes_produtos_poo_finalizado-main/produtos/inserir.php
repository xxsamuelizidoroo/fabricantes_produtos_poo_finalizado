<?php
require_once "../vendor/autoload.php";

// Sintaxe para os 2 de uma única vez
use CrudPoo\{Fabricante, Produto};

// Para instanciar
$fabricante = new Fabricante;
$produto = new Produto;
$listaDefabricantes = $fabricante->lerFabricantes();


if(isset($_POST['inserir'])){

    $produto->setNome($_POST['nome']);
    $produto->setPreco($_POST['preco']);
    $produto->setQuantidade($_POST['quantidade']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setFabricanteId($_POST['fabricante_id']);

    $produto->inserirProduto();

    header("location:listar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserir</title>
</head>
<body>
    <div class="container">
        <h1>Produtos | INSERT</h1>
        <hr>
        <form action="" method="post">
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>
            </p>
            <p>
                <label for="preco">Preço:</label>
                <input type="number" name="preco" id="preco" min="0" max="10000" step="0.01" required>
            </p>
            <p>
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" min="0" max="100" required>
            </p>
            <p>
            <label for="fabricante_id">Fabricante:</label>
            <select name="fabricante_id" id="fabricante_id" required > 
                <option value=""></option>
              <?php 
              foreach($listaDefabricantes as $fabricante){?>  
                <option value="<?= $fabricante['id']?>">
                    <?= $fabricante['nome']?>
                </option>
                <?php }?>
            </select>
            </p>
            <p>
            <label for="descricao">Descrição:</label><br>
            <textarea required name="descricao" id="descricao" cols="30" rows="3s"></textarea>
            </p>
            <p>
                <button type="submit" name="inserir">Inserir produtos</button>
            </p>
        </form>
    </div>
    <p><a href="listar.php">Voltar para lista de produtos</a></p>
    <p><a href="../index.php">home</a></p>     
</body>
</html>