<?php 
require_once "./dbConnection/connection.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$route = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

if($method == "GET"){

    if($route == "/usuarios"){
        $sqlSelect = "SELECT * FROM usuarios";
        $querySelect = $connection->query($sqlSelect);
        if($querySelect && $querySelect->num_rows > 0){
           
            while($row = $querySelect->fetch_assoc()){
                 $result = [
                "Email: " => $row["email"],
                "Senha: " => $row["senha"]
                 ];
               echo json_encode($result);

            }
        }else{
            echo "Nenhum usuario encontrado";
        }
        $connection->close();
    }
    
    else if($route == "/login"){
        echo "Fazendo login...";
    }
    else{ 
        echo "Não existe nenhuma rota nesse endereço!";
        return;
    }
}

if($method == "POST"){
    if($route == "/usuarios"){
        $json_data = file_get_contents('php://input');
        $data = json_decode($json_data, true);
        $email = $data["email"];
        $senha = $data["senha"];

        $json_post = [
            "Email" => $email,
            "Senha" => $senha
        ];

        echo json_encode($json_post);
            
        
    }
}