<?php

require "livro.php";

$livro = new Livro();

echo "<pre>";
print_r($livro->listarLivro('Diario de um banana', 2009, 'James'));
echo "<pre>";