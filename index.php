<?php
require_once "./dbConnection/connection.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$route = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];


if ($method == "GET") {

    if ($route == "/usuarios") {
        $sqlSelect = "SELECT * FROM usuarios";

        $querySelect = $connection->query($sqlSelect);
        if ($querySelect && $querySelect->num_rows > 0) {

            while ($row = $querySelect->fetch_assoc()) {
                $result = [
                    "Email" => $row["email"],
                    "Senha" => $row["senha"]
                ];
                echo json_encode($result);
            }
        } else {
            echo "Nenhum usuario encontrado";
        }
        // $connection->close(); ver para depois de fechar reabrir novamente;
    } else if ($route == "/login") {
        echo "Fazendo login...";
    } else {
        echo "Não existe nenhuma rota nesse endereço!";
        return;
    }
}

if ($method == "POST") {
    if ($route == "/usuarios") {
        $json_data = file_get_contents('php://input');
        $data = json_decode($json_data, true);

        $sqlSelect = "SELECT * FROM usuarios WHERE email = ?";
        $stmtSelect = $connection->prepare($sqlSelect);
        $stmtSelect->bind_param("s", $data["email"]);
        $stmtSelect->execute();
        $result = $stmtSelect->get_result();

        if ($result->num_rows > 0) {
            echo "Email já cadastrado";
            exit;
        } else {
            $sqlInsert = "INSERT INTO usuarios (email, senha) 
        VALUES (?, ?)";

            $stmt = $connection->prepare($sqlInsert);
            if ($stmt->bind_param("ss", $email, $senha)) {
                $email = $data["email"];
                $senha = $data["senha"];

                $stmt->execute();
                echo "Usuario criado com sucesso!";
            } else {
                echo "Erro ao criar usuario";
                exit;
            }
            $stmt->close();
            $connection->close();
        }

    }
}
