<?php

// Inclui o arquivo de autoload para carregar automaticamente as classes
require_once "../vendor/autoload.php";

// Importa a classe Fabricante do namespace CrudPoo
use CrudPoo\Fabricante;

// Cria uma instância da classe Fabricante
$fabricante = new Fabricante;

// Define o ID do fabricante com base nos dados da query string
$fabricante->setId($_GET['id']);

// Chama o método excluirFabricante() para remover o fabricante do banco de dados
$fabricante->excluirFabricante();

// Redireciona para a página de listar após a exclusão
header("location:listar.php");

