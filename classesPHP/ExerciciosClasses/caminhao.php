<?php
require_once "veiculos.php";

class Caminhao extends Veiculo{
    public function LigarMotor()
    {
       echo "Motor do caminhão ligado! uuuuuuu thiu uuuuuu thiu";
       echo "<br>";
    }
    public function DesligarMotor()
    {
        echo "Motor do caminhao Desligado!";
    }

    public function DescarregarCarga(){
        echo "Descarregando toda a carga";
        echo "0kg na caçamba";
    }
}