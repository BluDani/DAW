<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $valor = $_POST["valor"];

        $arquivo = fopen("produtos.txt", "a+") or die("ERROR ao abrir arquivo");

        $linha = "id;nome;valor\n";
        $linha = $id . ";" . $nome . ";" . $valor . "\n";

        fwrite($arquivo, $linha);
        fclose($arquivo);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>

    <link rel="stylesheet" href="myStyle.css">
</head>
<body>
    
<form action="adicionarProduto.php" method="POST">

    ID <input type="text" name="id" id="id">
    <br><br>

    Nome <input type="text" name="nome" id="nome">
    <br><br>

    Valor <input type="number" name="valor" id="valor">
    <br><br>

    <input type="submit" value="Incluir">
</form>

</body>
</html>