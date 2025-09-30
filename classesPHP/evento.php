<?php

class Evento {
    public int $identificador;
    protected string $eventoNome;
    private \DateTime $dataInicio;
    private \DateTime $dataFim;

    public function __construct(
        int $identificadorConstructor,
        string $nomeConstructor,
        string $dataInicioConstructor,
        string $dataFimConstructor
    )
    {
        $this->identificador = $identificadorConstructor;
        $this->eventoNome = $nomeConstructor;
        $this->dataInicio = \DateTime::createFromFormat("Y-m-d", $dataInicioConstructor);
    }

    public function comprarIngresso(int $quantidade, string $tipo){
        echo "A quantidade é de: " . $quantidade . " " . "e o tipo é: " . $tipo;
    }

    public static function fromArray() {
        return [];
    }

    public function getDataInicio() {
        return $this->dataInicio->format("d/m/Y");
    }
}