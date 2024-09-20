<?php

// Inclui o arquivo de autoload para carregar automaticamente as classes
require_once "../vendor/autoload.php";

// Importa a classe Fabricante do namespace CrudPoo
use CrudPoo\Fabricante;

// Verifica se o formulário foi submetido
if(isset($_POST['inserir'])){
    
    // Cria uma instância da classe Fabricante
    $fabricante = new Fabricante;
    
    // Define o nome do fabricante com base nos dados do formulário
    $fabricante->setNome($_POST['nome']);
    
    // Chama o método inserirFabricante() para adicionar o fabricante ao banco de dados
    $fabricante->inserirFabricante();

    // Redireciona para a página de listar após a inserção
    header("location:listar.php");
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Inserir</title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | INSERT</h1>
        <hr>
        <form action="" method="post">
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome">
            </p>
            <p>
                <button type="submit" name="inserir">Inserir fabricante</button>
            </p>
        </form>
    </div>
    <p><a href="listar.php">Voltar para lista de fabricantes</a></p>
    <p><a href="../index.php">home</a></p>     
</body>
</html>