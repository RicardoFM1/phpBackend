<?php

abstract class Veiculo {
    public int $qtdRodas;
    public int $qtdPortas;
    public int $potenciaCV;
    public string $cor;
    public string $marca;
    public string $modelo;
    
    abstract public function LigarMotor();
    abstract public function DesligarMotor();

    
    public function __construct(
        int $quantidadeRodas,
        int $quantidadePortas,
        int $potencia,
        string $cor,
        string $marca,
        string $modelo

    )
    {
        $this->qtdRodas = $quantidadeRodas;
        $this->qtdPortas = $quantidadePortas;
        $this->potenciaCV = $potencia;
        $this->cor = $cor;
        $this->marca = $marca;
        $this->modelo = $modelo;
    }
}