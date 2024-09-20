<?php
namespace CrudPoo;
use PDO, Exception;

final class Produto {

    private int $id;
    private string $nome;
    private float $preco;
    private int $quantidade;
    private string $descricao;
    private int $fabricanteId;
    private PDO $conexao;

    // Método construtor
    // ______________________________________________________________
    public function __construct()
    {
        $this->conexao = Banco::conecta();
    }

    // Funções
    // ______________________________________________________________

    public function lerProdutos():array{
        $sql = "SELECT produtos.id, produtos.nome AS produto, produtos.descricao, produtos.preco, produtos.quantidade, produtos.fabricante_id, fabricantes.nome AS fabricante FROM produtos INNER JOIN fabricantes ON produtos.fabricante_id = fabricantes.id ORDER BY produtos.nome";
        try{
            $consulta = $this->conexao->prepare($sql);
            $consulta -> execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);        
        }catch(Exception $erro){
            die("Erro: ".$erro->getMessage());
        }
        return $resultado;
    }

    // _______________________________

    public function inserirProduto():void{ 
        $sql = "INSERT INTO produtos(nome,preco,quantidade,descricao,fabricante_id) 
        VALUES(:nome, :preco, :quantidade, :descricao, :fabricante_id)";
        try{
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(':nome', $this->nome, PDO::PARAM_STR);
            $consulta->bindParam(':preco', $this->preco, PDO::PARAM_STR);
            $consulta->bindParam(':quantidade', $this->quantidade, PDO::PARAM_INT);
            $consulta->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
            $consulta->bindParam(':fabricante_id', $this->fabricanteId, PDO::PARAM_INT);
            $consulta->execute();
        }catch(Exception $erro){
            die("Erro: ". $erro->getMessage());
        }
    }

    // ______________________________________________

    public function lerUmProduto():array{
        $sql = "SELECT id, nome, preco, quantidade, descricao, fabricante_id FROM produtos WHERE id = :id";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(':id', $this->id, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta ->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
        return $resultado;
    }

    // ______________________________________________

    public function atualizarProduto():void{
        $sql = "UPDATE produtos SET nome = :nome, preco = :preco, quantidade = :quantidade, descricao = :descricao,fabricante_id = :fabricante_id  WHERE id = :id ";
        try{
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(':id',$this->id, PDO::PARAM_INT );
            $consulta->bindParam(':nome', $this->nome, PDO::PARAM_STR);
            $consulta->bindParam(':preco', $this->preco, PDO::PARAM_STR);
            $consulta->bindParam(':quantidade', $this->quantidade, PDO::PARAM_INT);
            $consulta->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
            $consulta->bindParam(':fabricante_id', $this->fabricanteId, PDO::PARAM_INT);
            $consulta->execute();
        }catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
    }

    // ______________________________________________

    public function excluirProduto():void{
        $sql = "DELETE FROM produtos WHERE id = :id";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta -> bindParam(':id',$this->id,PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
    }

    
    // Getters and setters (Métodos da classe Produto)
    // ______________________________________________________________

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

    }

    public function getNome(): string
    {
        return $this->nome;
    }


    public function setNome(string $nome)
    {
        $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);

    }

    public function getPreco(): float
    {
        return $this->preco;
    }


    public function setPreco(float $preco)
    {
        $this->preco = filter_var($preco, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }


    public function setQuantidade(int $quantidade)
    {
        $this->quantidade = filter_var($quantidade, FILTER_SANITIZE_NUMBER_INT);
        
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao)
    {
        $this->descricao = filter_var($descricao, FILTER_SANITIZE_SPECIAL_CHARS);

    }

    public function getFabricanteId(): int
    {
        return $this->fabricanteId;
    }

    public function setFabricanteId(int $fabricanteId)
    {
        $this->fabricanteId = filter_var($fabricanteId, FILTER_SANITIZE_NUMBER_INT);
  
    }


}

