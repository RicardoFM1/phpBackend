<?php

$serverhost = "mysql-planosite.alwaysdata.net";
$serverdb = "planosite_php";
$serveruser = "planosite_uphp";
$serverpassword = "php13579123";

$connection = new mysqli($serverhost, $serveruser, $serverpassword, $serverdb);

if(!$connection){
  echo "Erro ao conectar ao banco de dados: " . $connection->connect_error;
    exit;
}


