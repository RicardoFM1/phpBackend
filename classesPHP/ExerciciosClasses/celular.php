<?php


class Celular{
    public int $porcentagemBateria = 100;
    // public bool $ligado;

    public function Ligar(){
        // $this->ligado = true;
        echo "O celular está ligado";
        echo "<br>";
        echo "A porcentagem da bateria está em: " . $this->porcentagemBateria . "%";
    }

    public function Desligar(){
        // $this->ligado = false;
        echo "O celular está desligado";
    }

    public function UsarBateria(){
        $this->porcentagemBateria -= 10;
        echo "A bateria agora está em: " . $this->porcentagemBateria . "%";
    }
}