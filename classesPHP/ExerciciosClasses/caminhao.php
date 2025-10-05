<?php
require_once "veiculos.php";

class Caminhao extends Veiculo{
    public function LigarMotor()
    {
       echo "Motor do caminhão ligado!";
       echo "<br>";
    }
    public function DesligarMotor()
    {
        echo "Motor do caminhao Desligado!";
    }
}