<?php
$metodo = $_SERVER["REQUEST_METHOD"]; 
$rota = $_SERVER["REQUEST_URI"];

if($metodo == "POST"){

    if($rota == "/numeros"){
    $body = file_get_contents("php://input");
    $num = json_decode($body, true);
 

if($num["numero"] >= 1){
echo "O número é positivo";
return;
}
else if($num["numero"] < 0){
echo "O número é negativo";
return;
}
else{
    echo "O número é zero";
    return;
}
}

if($rota == "/semana"){
    $body = file_get_contents("php://input");
    $num = json_decode($body, true);

    $diasSemana = ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sabado"];

    if($num["numero"] > 0 && $num["numero"] <= 7){
        $indexSemana = (int)$num["numero"] - 1;
        echo $diasSemana[$indexSemana];
    }
    else{
        echo "Insira um número válido";
        return;
    }

}

if($rota == "/desconto"){
    $body = file_get_contents("php://input");
    $data = json_decode($body, true);

    if($data["valor"] >= 100){
        echo "Desconto de 10% " . "valor atual: R$ " . $data["valor"] - $data["valor"] * 0.10;
    }
    else if($data["valor"] >= 50 && $data["valor"] <= 99){
        echo "desconto de 5% " . "valor atual: R$ " .  $data["valor"] - $data["valor"] * 0.05;
    }
    else{
        echo $data["valor"];
        echo "<br>";
        echo "Nenhum desconto";
    }
}

if($rota == "/ano"){
    $body = file_get_contents("php://input");
    $data = json_decode($body, true);

    
    if($data["ano"] % 4 == 0 && $data["ano"] % 100 != 0 || $data["ano"] % 400 == 0){
        echo "Esse ano é bissexto";
    }
    else{
        echo "Esse ano não é bissexto!";
        return;
    }
}

if($rota == "/adivinhar"){
    $body = file_get_contents("php://input");
    $data = json_decode($body, true);

    $numeroAleatorio = mt_rand(1, 10);
    if($data["numero"] == $numeroAleatorio){
        echo "Você acertou o número aleatório, PARABÉNS";
        return;
    }
    if($numeroAleatorio < $data["numero"]){
        echo "Você errou o número, o número sorteado era menor que o que você digitou!";
        return;
    }
    else{
        echo "Você errou o número, o número sorteado era maior que o que você digitou!";
        return;
    }
}

if($rota == "/numeros/fatorial"){
    $body = file_get_contents("php://input");
    $data = json_decode($body, true);

    
    $num = $data["numero"];
    $numFatorial = 1;
    if($num >= 0){
        
        while($num > 1){
      
            $numFatorial *= $num;
            $num--;
        }
        
      
       echo $numFatorial;
       

    }
}
}

else if($metodo == "GET"){
    if($rota == "/numeros/somar"){
    

    $num = 1;
    $num2 = 0;
    while($num <= 100){
        $num2 += $num;
        $num++;
    }
    
    echo $num2;
}

if($rota == "/numeros/pares"){

    for($num = 1; $num <=50; $num++){
        if($num % 2 == 0 ){
            echo $num . "<br>";
        }
    }
}
    
if($rota = "/padrao"){
   
    for($numLinhas = 1; $numLinhas <= 1; $numLinhas++){
      $numChar = "";
        
        for($numCharLinha = 1; $numCharLinha <= 6; $numChar .= "*"){
           if(!empty($numChar)){
               echo $numChar;
            }
            echo "<br>";
            
            
            
            $numCharLinha++;
        }
    }
}

}
?>





<!-- * Exercícios de esturturas de repetição:


* Exercícios de Vetores e Matrizes

1. Leia um vetor de 10 números inteiros e exiba a soma de todos os elementos.

2. Leia um vetor de 8 números e informe qual o maior, o menor e suas posições no vetor.

3. Leia 5 números e mostre-os na ordem inversa de entrada.

4. Leia uma matriz 5x5 e mostre o maior elemento de cada linha. -->  

