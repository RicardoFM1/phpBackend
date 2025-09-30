<?php

require 'evento.php';

$evento = new Evento(1, "Evento teste", "2025-09-22", "2025-10-14");

$evento->identificador = 403232;


echo "<pre>";
print_r($evento->identificador);
echo "<pre>";
echo "<pre>";
print_r($evento->comprarIngresso("1", "meia"));
echo "<pre>";
echo "<pre>";
print_r($evento->getDataInicio());
echo "<pre>";
echo "<pre>";
print_r(Evento::fromArray());
echo "<pre>";