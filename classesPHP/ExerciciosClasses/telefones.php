<?php 

class Agenda {
    public $listaTelefones = [
        "nomes" =>[
            "Ricardo",
            "Pablo",
            "Gustavo"
        ],
        "telefone" => [
            "51929388223",
            "49929300533",
            "29493892065"
        ]
    ];

    public function AdicionarTelefone(string $nome, string $telefone){
       array_push($this->listaTelefones["nomes"], $nome);
       array_push($this->listaTelefones["telefone"], $telefone);
    }
    public function RemoverTelefone(string $nome, string $telefone){
        foreach ($this->listaTelefones["nomes"] as $indice => $valorNome) {
            if ($valorNome === $nome && $this->listaTelefones["telefone"][$indice] === $telefone) {
                unset($this->listaTelefones["nomes"][$indice]);
                unset($this->listaTelefones["telefone"][$indice]);
              
                $this->listaTelefones["nomes"] = array_values($this->listaTelefones["nomes"]);
                $this->listaTelefones["telefone"] = array_values($this->listaTelefones["telefone"]);
                return true;
            }
        }
        return false; 
    }
    
}