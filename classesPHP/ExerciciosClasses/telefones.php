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
    public function RemoverTelefone(){

    }
    
}