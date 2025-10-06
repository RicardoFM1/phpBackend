<?php
require_once "veiculos.php";

class Carro extends Veiculo{
    public function LigarMotor(){
        echo "Motor do carro ligado! brrr br br br br";
        echo "<br>";
    }
    public function DesligarMotor()
    {
        echo "Motor do carro desligado!";
    }
}