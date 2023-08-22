<html>

<head>
<title>Calculadora</title>
</head>

<body>
    <h1>Calculadora</h1>

    <form method="GET" action="ex02_soma.php">
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
        <input type="submit" value="enviar">
    </form>

<?php

    $v1 = $_GET["op1"];
    $v2 = $_GET["op2"];
    $escolha = $_GET["escolha"];

    function soma(){
       $result = $v1 + $v2;
    }

    function subtracao(){
        $result = $v1 - $v2;
    }

    function multiplicacao(){
        $result = $v1 * $v2;
    }

    function divisao(){
        $result = $v1 / $v2;
    }

    switch($escolha){

        case 1: soma();
        break;

        case 2: subtracao();
        break;

        case 3: multiplicacao();
        break;

        case 4: divisao();
        break;
    }
    echo "<h1>Resultado</h1>";
    echo "<h2>$result</h2>";

?>
</body>
</html>
