<?php

require "livro.php";
require "celular.php";
require "telefones.php";

$livro = new Livro();
$celular = new Celular();
$telefones = new Agenda();

echo "<pre>";
print_r($livro->listarLivro('Diario de um banana', 2009, 'James'));
echo "<pre>";

echo "<pre>";
print_r($celular -> Ligar());
echo "<pre>";
echo "<pre>";
print_r($celular->UsarBateria());
echo "<pre>";
echo "<pre>";
print_r($celular->Desligar());
echo "<pre>";
echo "<br>";

echo "<pre>";
print_r($telefones->listaTelefones);
echo "<pre>";
echo "<pre>";
print_r($telefones->AdicionarTelefone("NovaAdicao", "513094920201"));
echo "<pre>";
echo "<br>";
echo "Lista atualizada de telefones: ";
echo "<pre>";
print_r($telefones->listaTelefones);
echo "<pre>";
