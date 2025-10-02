<?php
require 'carro.php';

$carro = new Carro(1, 1, 1, 'Toyota','Azul');

echo "<pre>";
print_r($carro);
echo "<pre>";
echo "<pre>";
print_r('Quantidade de portas:' . $carro->qtdPortas);
echo "<pre>";
print_r($carro->ligarMotor());



// require 'evento.php';

// $evento = new Evento(1, "Evento teste", "2025-09-22", "2025-10-14");

// $evento->identificador = 403232;


// echo "<pre>";
// print_r($evento->identificador);
// echo "<pre>";
// echo "<pre>";
// print_r($evento->comprarIngresso("1", "meia"));
// echo "<pre>";
// echo "<pre>";
// print_r($evento->getDataInicio());
// echo "<pre>";
// echo "<pre>";
// print_r(Evento::fromArray());
// echo "<pre>";