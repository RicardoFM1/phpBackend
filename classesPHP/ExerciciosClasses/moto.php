<?php
require_once "veiculos.php";

class Moto extends Veiculo
{
    public function LigarMotor()
    {
        echo "Motor da moto ligado! rom rom rom rommm";
        echo "<br>";
    }
    public function DesligarMotor()
    {
        echo "Motor da moto desligado!";
    }

    public function EmpinarMoto(){
        echo "Moto sendo empinada!";
        echo "Os tiras estão atrás!!";
    }
}
