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
    
if($rota == "/padrao"){
   
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
if($rota == "/numeros/vetor/somar"){
    $vetor = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

    $sum = array_sum($vetor);
    echo $sum;

//     $sum = 0;
//   foreach($vetor as $num){
//     $sum += $num; 
//   }
//   echo $sum;
        
    
}
if($rota == "/numeros/vetor/posicao"){
    $vetor = [1, 2, 3, 4, 5, 6, 7, 8];

    echo "O maior valor do vetor é: " . max($vetor);
    $posicao = array_search(max($vetor), $vetor);
    echo "<br>";
    echo "A sua posiçao é: " . $posicao;
    echo "<br>";
    $posicaoMenor = array_search(min($vetor), $vetor);
    echo "O menor valor do vetor é: " . min($vetor);
    echo "<br>";
    echo "A sua posição é: " . $posicaoMenor;
    echo "<br>";

}
if($rota == "/numeros/vetor/inverso"){
    $nums = [1, 2, 3, 4, 5];

    $numsInverso = [array_reverse($nums)];
    echo "Esse são os números: ";
    echo "<br>";
    echo "<pre>";
    print_r($nums);
    echo "<pre>";
    echo "<br>";
    echo "Este é o inverso desses números: ";
    echo "<br>";
    echo "<pre>";
    print_r($numsInverso);
    echo "<pre>"; 
}
if($rota == "/numeros/matriz/5x5"){
    $matriz = [
        [1,2,43,53,21],
        [12,22,16,17,18],
        [14,26,63,211,23],
        [19,6,24,67,15],
        [29,32,49,90,7]
    ];
    // echo "<pre>";
    // print_r($matriz);
    // echo "<pre>";
    echo "O maior elemento da primeira linha do 5x5 é: " . max($matriz[0]);
    echo "<br>";
    echo "O maior elemento da segunda linha do 5x5 é: " . max($matriz[1]);
    echo "<br>";
    echo "O maior elemento da terceira linha do 5x5 é: " . max($matriz[2]);
    echo "<br>";
    echo "O maior elemento da quarta linha do 5x5 é: " . max($matriz[3]);
    echo "<br>";
    echo "O maior elemento da quinta linha do 5x5 é: " . max($matriz[4]);
}
}
?>



 

