<?php

// Inclui o arquivo de autoload para carregar automaticamente as classes
require_once "../vendor/autoload.php";

// Importa a classe Fabricante do namespace CrudPoo
use CrudPoo\Fabricante;

// Cria uma instância da classe Fabricante
$fabricante = new Fabricante;

// Chama o método lerFabricantes() para obter a lista de fabricantes
$listaDeFabricantes = $fabricante->lerFabricantes();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Lista </title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | SELECT</h1> 
        <a href="../index.php">HOME</a>
        <hr>
        <h2>Lendo e carregando todos os fabricantes</h2>
        <p><a href="inserir.php">Inserir um novo fabriante</a></p>

    <?php if(isset($_GET['status']) && $_GET['status'] == 'sucesso'){?>
        <p>Fabricantes atualizado com sucesso!</p>
    <?php }?>

         <table>
             <caption>Lista de Fabricantes</caption>
             <thead>
                 <tr>
                     <th>ID</th>
                     <th>Nome</th>
                     <th colspan="2">Operações</th>
                 </tr>
             </thead>
             <tbody>
<?php foreach($listaDeFabricantes as $fabricante){?>
    <tr>
        <td><?=$fabricante['id']?></td>    
        <td><?=$fabricante['nome']?></td>  
        <td><a href="atualizar.php?id=<?=$fabricante['id']?>" style="color:blue;">Atualizar</a></td>
        <td><a class="excluir" href="excluir.php?id=<?=$fabricante['id']?>" style="color:red;">Excluir</a></td>
    </tr>  
<?php }?>

</tbody>
</table>
</div>
<script src="../src/excluir.js"></script>
</body>
</html>