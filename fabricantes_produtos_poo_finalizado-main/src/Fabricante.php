<?php
namespace CrudPoo;
use PDO,Exception;

// Classe final significa que ela não pode ser extendida (não pode ter subclasses)
final class Fabricante{
    private int $id;
    private string $nome;
    /* Esta propriedades receberá os recursos PDO através da classe Banco (dependência do projeto) */
    private PDO $conexao; 

    
    // O construtor é um método especial em uma classe em POO. O construtor geralmente é usado para realizar inicializações e configurações necessárias no objeto.
    public function __construct()
    {
        /* No momento em que for criado um objeto a partir da classe Fabricante, automaticamente será feita a conexão com o banco. */
        $this->conexao = Banco::conecta();    
    }

    /* LER TODOS FABRICANTES */
    public function lerFabricantes():array{
        $sql = "SELECT id, nome FROM fabricantes ORDER BY nome";//string com o comando sql
        try{
        // Preparação e execução da consulta SQL
        $consulta = $this->conexao->prepare($sql);
        $consulta->execute();

        // Obtém todas as linhas do resultado como um array associativo
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $erro){ 
            // Em caso de exceção (erro na consulta), exibe uma mensagem de erro e encerra o script
            die("Erro: ".$erro->getMessage());
        }
        // Retorna o resultado da consulta como um array associativo
        return $resultado;
    }
    
    /* INSERIR FABRICANTE */
    public function inserirFabricante():void{
        $sql = "INSERT INTO fabricantes(nome)  VALUES (:nome)";
        try {
            $consulta = $this->conexao ->prepare($sql);
            $consulta->bindParam(':nome',$this->nome,PDO::PARAM_STR);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
    }

    /* LER UM FABRICANTE */
    public function lerUmFabricante():array{
        $sql = "SELECT id, nome FROM fabricantes WHERE id = :id";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(':id', $this->id, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
        return $resultado;
    }

    /* Atualizar Fabricante */
    public function atualizarFabricante():void{
        $sql = "UPDATE fabricantes SET nome = :nome WHERE id = :id";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(':id',$this->id, PDO::PARAM_INT );
            $consulta->bindParam(':nome',$this->nome, PDO::PARAM_STR);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
    }

    /* Excluir Fabricante */
    public function excluirFabricante():void{
        $sql = "DELETE FROM fabricantes WHERE id = :id";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta -> bindParam(':id',$this->id,PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }

    }

    // ____________________________________________________________________________________________________
    // Métodos da classe (Fabricante)

    // Método para obter o valor da propriedade 'id'
    public function getId(): int
    {
        return $this->id;
    }

    // Método para definir o valor da propriedade 'id'
    public function setId(int $id)
    {
        // Filtra e sanitiza o valor de 'id' como um número inteiro
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    }
    
    // __________________________________________________________________

    // Método para obter o valor da propriedade 'nome'
    public function getNome(): string
    {
        return $this->nome;
    }

    // Método para definir o valor da propriedade 'nome'
    public function setNome(string $nome)
    {
        // Filtra e sanitiza o valor de 'nome' removendo caracteres especiais
        $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
    }

}