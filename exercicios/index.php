<?php

$rota = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

$eventos = [
            [
                "id" => 1,
                "nome" => "OktoberFest",
                "data_de_inicio" => "2025/09/22",
                "data_de_termino" => "2025/09/27",
                "ingressos" => [
                    "meia_entrada" => [
                        "valor" => 25,
                        "quantidade_disponivel" => 20,
                        "quantidade_vendida" => 5
                    ],
                    "inteiro" => [
                        "valor" => 50,
                        "quantidade_disponivel" => 30,
                        "quantidade_vendida" => 20
                    ]
                ]
            ],
                    
                [
                    "id" => 2,
                    "nome" => "Festa das cucas",
                    "data_de_inicio" => "2025/10/20",
                    "data_de_termino" => "2025/10/25",
                    "ingressos" => [
                        "meia_entrada" => [
                            "valor" => 40,
                            "quantidade_disponivel" => 25,
                            "quantidade_vendida" => 10
                        ],
                        "inteiro" => [
                            "valor" => 80,
                            "quantidade_disponivel" => 45,
                            "quantidade_vendida" => 25
                        ]
                    ]
                ],
                [
                    "id" => 3,
                    "nome" => "Balões de Ar quente",
                    "data_de_inicio" => "2025/11/12",
                    "data_de_termino" => "2025/11/18",
                    "ingressos" => [
                        "meia_entrada" => [
                            "valor" => 60,
                            "quantidade_disponivel" => 32,
                            "quantidade_vendida" => 15
                        ],
                        "inteiro" => [
                            "valor" => 120,
                            "quantidade_disponivel" => 55,
                            "quantidade_vendida" => 12
                        ]
                    ]
                ]
                        ];
                    
        

if ($method == "GET") {
$match = [];
    if ($rota == "/eventos") {
        
        
    echo json_encode($eventos);
    exit;
    }
    else if (preg_match("#^/eventos/(\d+)$#", $rota, $matches)) {
        $id = (int)$matches[1];
        $eventoEncontrado = null;

        foreach ($eventos as $evento) {
            if ($evento["id"] === $id) {
                $eventoEncontrado = $evento;
                break;
            }
        }

        if ($eventoEncontrado) {
            echo json_encode($eventoEncontrado);
        } else {
            http_response_code(404);
            echo json_encode(["erro" => "Evento não encontrado"]);
        }
        exit;
    
    }
     
}
if($method == "POST"){
    if(preg_match("#^/eventos/comprar/(\d+)$#", $rota, $matches)){
        $body = file_get_contents("php://input");
        $data = json_decode($body, true);

       $id = (int)$matches[1];
       $eventoEncontrado = null;

        foreach($eventos as $evento){
            if($evento["id"] === $id){
                $eventoEncontrado = $evento;
                break;
            }
        }

        if($eventoEncontrado){
        $tipo_ingresso = $data["tipo"] ?? null;
        $quantidade = $data["quantidade"] ?? 0;

            $resposta = [
            "message" => "Ingresso comprado com sucesso!",
            "evento" => $eventoEncontrado["nome"],
            "tipo" => $tipo_ingresso,
            "data_de_inicio" => $eventoEncontrado["data_de_inicio"],
            "data_de_termino" => $eventoEncontrado["data_de_termino"],
            "quantidade_disponivel" => $eventoEncontrado["ingressos"][$tipo_ingresso]["quantidade_disponivel"] - $quantidade,
            "quantidade_vendida" => $eventoEncontrado["ingressos"][$tipo_ingresso]["quantidade_vendida"] + $quantidade

        ];
            echo json_encode($resposta);
        }
        else{
            http_response_code(404);
            echo json_encode(["Erro" => "Evento não encontrado"]);
        }
    }
}