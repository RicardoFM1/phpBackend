<?php
require("../dbConnection/connection.php");
$rota = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];



if ($method == "GET") {
    if ($rota == "/eventos") {
        $sqlSelect = "SELECT * from eventos";
        $eventos = [];

        $selectQuery = $connection->query($sqlSelect);
        if ($selectQuery && $selectQuery->num_rows > 0) {
            while ($row = $selectQuery->fetch_assoc()) {
                $result = [
                    "id" => $row["id"],
                    "nome" => $row["nome"],
                    "data_de_inicio" => $row["data_de_inicio"],
                    "data_de_termino" => $row["data_de_termino"],
                    "ingresso_m_valor" => $row["ingresso_m_valor"],
                    "ingresso_m_disponivel" => $row["ingresso_m_disponivel"],
                    "ingresso_m_vendido" => $row["ingresso_m_vendido"],
                    "ingresso_i_valor" => $row["ingresso_i_valor"],
                    "ingresso_i_disponivel" => $row["ingresso_i_disponivel"],
                    "ingresso_i_vendido" => $row["ingresso_i_vendido"]
                ];
                $eventos = $result;
            }
        }else{
            http_response_code(404);
            echo json_encode("Nenhum evento encontrado");
            return;
        }
        
    }else{
        http_response_code(404);
        echo json_encode("Nenhuma rota encontrada");
        return;
    }
    echo json_encode($eventos);
}


if($method == "POST"){
    if($rota == "/eventos"){
        $body = file_get_contents('php://input');
        $data = json_decode($body, true);

    $nome = $data["nome"];
    $dtInicio = $data["data_de_inicio"];
    $dtTermino = $data["data_de_termino"];
    $ingressoMValor = $data["ingresso_m_valor"];
    $ingressoMDisponivel = $data["ingresso_m_disponivel"];
    $ingressoMVendido = $data["ingresso_m_vendido"];
    $ingressoIValor = $data["ingresso_i_valor"];
    $ingressoIDisponivel = $data["ingresso_i_disponivel"];
    $ingressoIVendido = $data["ingresso_i_vendido"];

    if(isset($_POST["nome"]) || empty($_POST["nome"]) || isset($_POST["data_de_inicio"]) || empty($_POST["data_de_inicio"]) 
    || isset($_POST["data_de_termino"]) || empty($_POST["data_de_termino"]) || isset($_POST["ingresso_m_valor"]) || empty($_POST["ingresso_m_valor"])
    || isset($_POST["ingresso_m_disponivel"]) || empty($_POST["ingresso_m_disponivel"]) || isset($_POST["ingresso_m_vendido"]) || empty($_POST["ingresso_m_vendido"])
    || isset($_POST["nome"]) || empty($_POST["nome"]) || isset($_POST["nome"]) || empty($_POST["nome"]
    || isset($_POST["nome"]) || empty($_POST["nome"]))){

        http_response_code(400);
        echo json_encode("Necessário preencher os campos!");
        return;
    }

        $sqlInsert = "INSERT INTO eventos (nome,
 data_de_inicio ,
 data_de_termino ,
 ingresso_m_valor ,
 ingresso_m_disponivel ,
 ingresso_m_vendido ,
 ingresso_i_valor ,
 ingresso_i_disponivel ,
 ingresso_i_vendido)
 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

 $stmtInsertPrepare = $connection->prepare($sqlInsert);

 if($stmtInsertPrepare->bind_param("sssssssss",
 $nome, $dtInicio, $dtTermino, $ingressoMValor, $ingressoMDisponivel, $ingressoMVendido,
 $ingressoIValor, $ingressoIDisponivel, $ingressoIVendido)){
     
     $stmtInsertPrepare->execute();
     echo json_encode("Evento criado com sucesso!");
 }



 
    }else{
        http_response_code(404);
        echo json_encode("Rota não encontrada");
        return;
    }
}
//^
//|
//validação depois

// $eventos = [
//             [
//                 "id" => 1,
//                 "nome" => "OktoberFest",
//                 "data_de_inicio" => "2025/09/22",
//                 "data_de_termino" => "2025/09/27",
//                 "ingressos" => [
//                     "meia_entrada" => [
//                         "valor" => 25,
//                         "quantidade_disponivel" => 20,
//                         "quantidade_vendida" => 5
//                     ],
//                     "inteiro" => [
//                         "valor" => 50,
//                         "quantidade_disponivel" => 30,
//                         "quantidade_vendida" => 20
//                     ]
//                 ]
//             ],
                    
//                 [
//                     "id" => 2,
//                     "nome" => "Festa das cucas",
//                     "data_de_inicio" => "2025/10/20",
//                     "data_de_termino" => "2025/10/25",
//                     "ingressos" => [
//                         "meia_entrada" => [
//                             "valor" => 40,
//                             "quantidade_disponivel" => 25,
//                             "quantidade_vendida" => 10
//                         ],
//                         "inteiro" => [
//                             "valor" => 80,
//                             "quantidade_disponivel" => 45,
//                             "quantidade_vendida" => 25
//                         ]
//                     ]
//                 ],
//                 [
//                     "id" => 3,
//                     "nome" => "Balões de Ar quente",
//                     "data_de_inicio" => "2025/11/12",
//                     "data_de_termino" => "2025/11/18",
//                     "ingressos" => [
//                         "meia_entrada" => [
//                             "valor" => 60,
//                             "quantidade_disponivel" => 32,
//                             "quantidade_vendida" => 15
//                         ],
//                         "inteiro" => [
//                             "valor" => 120,
//                             "quantidade_disponivel" => 55,
//                             "quantidade_vendida" => 12
//                         ]
//                     ]
//                 ]
//                         ];
                    
        

// if ($method == "GET") {
// $match = [];
//     if ($rota == "/eventos") {
        
        
//     echo json_encode($eventos);
//     exit;
//     }
//     else if (preg_match("#^/eventos/(\d+)$#", $rota, $matches)) {
//         $id = (int)$matches[1];
//         $eventoEncontrado = null;

//         foreach ($eventos as $evento) {
//             if ($evento["id"] === $id) {
//                 $eventoEncontrado = $evento;
//                 break;
//             }
//         }

//         if ($eventoEncontrado) {
//             echo json_encode($eventoEncontrado);
//         } else {
//             http_response_code(404);
//             echo json_encode(["erro" => "Evento não encontrado"]);
//         }
//         exit;
    
//     }
     
// }
// if($method == "POST"){
//     if(preg_match("#^/eventos/comprar/(\d+)$#", $rota, $matches)){
//         $body = file_get_contents("php://input");
//         $data = json_decode($body, true);

//        $id = (int)$matches[1];
//        $eventoEncontrado = null;

//         foreach($eventos as $evento){
//             if($evento["id"] === $id){
//                 $eventoEncontrado = $evento;
//                 break;
//             }
//         }

//         if($eventoEncontrado){
//         $tipo_ingresso = $data["tipo"] ?? null;
//         $quantidade = $data["quantidade"] ?? 0;

//             $resposta = [
//             "message" => "Ingresso comprado com sucesso!",
//             "evento" => $eventoEncontrado["nome"],
//             "tipo" => $tipo_ingresso,
//             "data_de_inicio" => $eventoEncontrado["data_de_inicio"],
//             "data_de_termino" => $eventoEncontrado["data_de_termino"],
//             "quantidade_disponivel" => $eventoEncontrado["ingressos"][$tipo_ingresso]["quantidade_disponivel"] - $quantidade,
//             "quantidade_vendida" => $eventoEncontrado["ingressos"][$tipo_ingresso]["quantidade_vendida"] + $quantidade

//         ];
//             echo json_encode($resposta);
//         }
//         else{
//             http_response_code(404);
//             echo json_encode(["Erro" => "Evento não encontrado"]);
//         }
//     }
// }