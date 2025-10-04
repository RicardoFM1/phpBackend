<?php

require "livro.php";
require "celular.php";

$livro = new Livro();
$celular = new Celular();

echo "<pre>";
print_r($livro->listarLivro('Diario de um banana', 2009, 'James'));
echo "<pre>";

echo "<pre>";
print_r($celular -> Ligar());
echo "<pre>";
echo "<pre>";
print_r($celular->Desligar());
echo "<pre>";
echo "<pre>";
print_r($celular->UsarBateria());
echo "<pre>";

