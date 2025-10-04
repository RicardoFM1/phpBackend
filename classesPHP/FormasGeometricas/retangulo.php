<?php 

require_once "FormaGeometrica.php";

class Retangulo extends FormaGeometria {
    public function calcularArea(float $base, float $altura)
    {
    echo "calculo da área do retângulo";
    echo "<br>";
    $this->area = $base * $altura;
    }
}