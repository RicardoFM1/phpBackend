<?php

require "retangulo.php";
require "triangulo.php";
require_once "FormaGeometrica.php";



$retangulo = new Retangulo();
echo "<pre>";
print_r(CalcularAreas($retangulo));
echo "<pre>";
$triangulo = new Triangulo();
echo "<pre>";
print_r(CalcularAreas($triangulo));
echo "<pre>";

function CalcularAreas(FormaGeometria $formaGeometria){
 $formaGeometria->calcularArea(2,2);
 return $formaGeometria->getArea();
}
