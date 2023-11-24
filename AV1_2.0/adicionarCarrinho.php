<?php

    $msg = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $quant = $_POST["quant"];
        $valor = $_POST["valor"];

        $arquivo = fopen("carrinho.txt", "a+") or die("ERROR ao abrir arquivo");

        $msg = "Produto adicionado no carrinho";

        $linha = "id;nome;quant;valor\n";
        $linha = $id . ";" . $nome . ";" . $quant . ";" . $valor;

        fwrite($arquivo, $linha);
        fclose($arquivo);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar no carrinho</title>
</head>
<body>
    
    <?php echo $msg?>

    <button><a href="listarProduto.php">Voltar</a></button>
</body>
</html>