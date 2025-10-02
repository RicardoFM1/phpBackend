<?php 
require 'veiculo.php';

class Carro extends Veiculo
{
    public string $modelo = "Touro";
    
    public function ligarMotor () {
        echo 'Ligando o motor';
        echo 'Este carro tem ' . " "  . $this->qtdPortas . " " . "portas";
        echo "<br>";
        echo "Este carro tem " . $this->qtdRodas . "rodas";
        echo "<br>";
        echo "Este carro tem " . $this->potencia . "cv";
        echo "<br>";
        echo "A cor do carro é " . " " . $this->getCor();
        exit;
    }
}