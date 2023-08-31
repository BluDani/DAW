<!doctype html>
<html>

<head>
<title>Calculadora</title>
</head>

<body>
    <h1>Calculadora</h1>

    <form method="POST" action="Atividade calculadora.php">
        operador 1: <input type="number" name="op1">
        operador 2: <input type="number" name="op2">
        <br>
        <br>
        <br>

        <input type="radio" name="escolha" value="1" >
        <label>Soma</label>
        <br>

        <input type="radio" name="escolha" value="2" >
        <label>Subtração</label>
        <br>

        <input type="radio" name="escolha" value="3" >
        <label>Multiplicação</label>
        <br>

        <input type="radio" name="escolha" value="4" >
        <label>Divisão</label>

        <br>
        <br>
        <br>
        <input type="submit" value="calcular">
    </form>

<?php

    $v1 = $_POST["op1"];
    $v2 = $_POST["op2"];
    $escolha = $_POST["escolha"];

    function soma($v1, $v2){
       $result = $v1 + $v2;

       echo "<h2>$result</h2>";
    }

    function subtracao($v1, $v2){
        $result = $v1 - $v2;

        echo "<h2>$result</h2>";
    }

    function multiplicacao($v1, $v2){
        $result = $v1 * $v2;

        echo "<h2>$result</h2>";
    }

    function divisao($v1, $v2){
        $result = $v1 / $v2;

        echo "<h2>$result</h2>";
    }

    function potencia($v1, $v2){
        $result = pow($v1, $v2);

        echo "<h2>$result</h2>";
    }

    function seno($v1, $v2){
        $result = $v1 / $v2;

        echo "<h2>$result</h2>";
    }

    function cosseno($v1, $v2){
        $result = $v1 / $v2;

        echo "<h2>$result</h2>";
    }

    function tangente($v1, $v2){
        $result = $v1 / $v2;

        echo "<h2>$result</h2>";
    }

    echo "<h1>Resultado</h1>";

    switch($escolha){

        case 1: soma($v1, $v2);
        break;

        case 2: subtracao($v1, $v2);
        break;

        case 3: multiplicacao($v1, $v2);
        break;

        case 4: divisao($v1, $v2);
        break;
    }

?>
</body>
</html>
