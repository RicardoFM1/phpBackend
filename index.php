<?php 

$route = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

if($method == "GET"){

    if($route == "/usuarios"){
        echo "Buscando os usuários disponíveis no sistema";
    }
    
    else if($route == "/login"){
        echo "Fazendo login...";
    }
    else{ 
        echo "Não existe nenhuma rota nesse endereço!";
        return;
    }
}