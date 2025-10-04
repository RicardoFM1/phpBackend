<?php

class Livro {
    public function listarLivro(string $nome, int $lancamento, string $autor){
        echo "As informações do livro são:";
        echo "<br>";
        echo "Nome: " . $nome;
        echo "<br>";
        echo "Lançamento: " . $lancamento;
        echo "<br>";
        echo "Autor: " . $autor;
    }
}