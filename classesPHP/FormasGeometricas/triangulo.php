<?php

require_once "FormaGeometrica.php";

class Triangulo extends FormaGeometria {
    public function calcularArea(float $base, float $altura)
    {
        $this->area = ($base * $altura) / 2;
    }
}