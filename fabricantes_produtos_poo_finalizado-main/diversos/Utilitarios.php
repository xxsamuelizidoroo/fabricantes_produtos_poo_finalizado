<?php
 namespace CrudDiversos;
 
 // Classe abstrata Utilitarios
 abstract class Utilitarios {

    // Método estático para formatar um valor como moeda brasileira
    public static function trataMoeda(float $valor):string {
        return "R$ ".number_format($valor, 2, ",", ".");
    }

    // Método estático para exibir um array de dados formatado
    public static function teste(array $dados) {
        echo "<pre>";
        var_dump($dados);
        echo "</pre>";
    }

}