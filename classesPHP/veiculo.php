<?php 
class Veiculo
{
 public int $qtdRodas;
 public int $qtdPortas;
 protected int $potencia;
 protected string $marca;
 protected string $modelo;
 private string $cor;


 public function __construct(
    int $qtdRodas,
    int $qtdPortas,
    int $potencia,
    string $marca,
    string $cor
 )
 {
    $this->qtdRodas = $qtdRodas;
    $this->qtdPortas = $qtdPortas;
    $this->potencia = $potencia;
    $this->marca = $marca;
    $this->cor = $cor;
 }
 public function getCor(){
    return $this->cor;
 }
}