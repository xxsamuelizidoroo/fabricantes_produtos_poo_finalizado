<?php

// EXPLICAÇÃO (namespace)
// namespace é uma forma de organizar classes, evitando conflitos de nome entre diferentes partes do código. No caso, a classe Banco está no namespace CrudPoo, e isso significa que para acessá-la, você precisa usar CrudPoo\Banco

namespace CrudPoo;

// Indica que as classes PDO e Exception serão utilizadas neste arquivo
use PDO, Exception;

// Definição da classe abstrata Banco no namespace CrudPoo

abstract class Banco {
    /* Proppriedades ou atributos de acesso ao servidor de banco de dados*/
    private static string  $servidor = "localhost";
    private static string  $usuario = "root";
    private static string  $senha = "";
    private static string  $banco = "vendas";
    /* private static \PDO $conexao;  Não precisa do use PDO*/
    private static PDO $conexao;

    /* Método de conexão ao banco */

    public static function conecta():PDO 
    {
        try{
            self::$conexao = new PDO(
                "mysql:host=".self::$servidor."; 
                dbname=".self::$banco."; 
                charset=utf8",
                self::$usuario, /* self:: da acesso recursos statics dentro da classe */
                self::$senha
            );

            // Configura o modo de erro e exceção
            self::$conexao ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
        }catch(Exception $erro){
            // Em caso de exceção (erro na conexão), exibe uma mensagem de erro e encerra o script
            die("Deu ruim: ".$erro->getMessage());
        }
        // Retorna a instância de conexão PDO
        return self::$conexao;
    }
}
