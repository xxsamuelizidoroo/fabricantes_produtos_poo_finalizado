<?php

// Inclui o arquivo de autoload para carregar automaticamente as classes
require_once '../vendor/autoload.php';

// Importa a classe Fabricante do namespace CrudPoo
use CrudPoo\Fabricante;

// Cria uma instância da classe Fabricante
$fabricante = new Fabricante;

// Define o ID do fabricante com base nos dados da query string
$fabricante->setId($_GET['id']);

// Obtém os dados de um fabricante específico do banco de dados
$umFabricante = $fabricante->lerUmFabricante();

// Verifica se o formulário foi submetido para atualizar o fabricante
if(isset($_POST['atualizar'])){
    // Define o nome do fabricante com base nos dados do formulário
    $fabricante->setNome($_POST['nome']);
    
    // Chama o método atualizarFabricante() para atualizar os dados do fabricante no banco de dados
    $fabricante->atualizarFabricante();
 
    // Redireciona para a página de listar com um status de sucesso na query string
    header("location:listar.php?status=sucesso");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Atualizar</title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | SELECT/UPDATE</h1>
        <hr>
        <form action="" method="post">
            
            <input type="hidden" name="<?=$umFabricante['id']?>">
            <p>
                <label for="nome">Nome:</label>
                
                <input type="text" name="nome" id="nome" value="<?=$umFabricante['nome']?>">
            </p>
            <p>
                <button type="submit" name="atualizar">Atualizar fabricante</button>
            </p>
        </form>
    </div>
    <p><a href="listar.php">Voltar para lista de fabricantes</a></p>
    <p><a href="../index.php">home</a></p>     
</body>
</html>