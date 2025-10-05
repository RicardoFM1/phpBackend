<?php

require "livro.php";
require "celular.php";
require "telefones.php";
require "moto.php";
require "carro.php";
require "caminhao.php";

$livro = new Livro();
$celular = new Celular();
$telefones = new Agenda();
$moto = new Moto(2, 0, 100, 'Azul', 'Koeniggseg', 'Regera');
$carro = new Carro(4, 4, 200, 'Preto', 'Kawasaki', 'Ninja');
$caminhao = new Caminhao(8, 2, 300, 'Branco', 'Volvo', 'FH');

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

$telefones->AdicionarTelefone("NovaAdicao", "513094920201");

echo "<br>";
echo "Lista atualizada de telefones: ";
echo "<pre>";
print_r($telefones->listaTelefones);
echo "<pre>";

$telefones->RemoverTelefone("NovaAdicao", "513094920201");

echo "<br>";
echo "Lista atualizada de telefones: ";
echo "<pre>";
print_r($telefones->listaTelefones);
echo "<pre>";

echo "<pre>";
print_r($moto);
echo "<pre>";

$moto->LigarMotor();
$moto->DesligarMotor();

echo "<pre>";
print_r($carro);
echo "<pre>";

$carro->LigarMotor();
$carro->DesligarMotor();

echo "<pre>";
print_r($caminhao);
echo "<pre>";

$caminhao->LigarMotor();
$caminhao->DesligarMotor();