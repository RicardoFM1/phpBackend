<?php
require_once "veiculos.php";

class Moto extends Veiculo
{
    public function LigarMotor()
    {
        echo "Motor da moto ligado!";
        echo "<br>";
    }
    public function DesligarMotor()
    {
        echo "Motor da moto desligado!";
    }

}
