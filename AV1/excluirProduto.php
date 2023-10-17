<?php

    $arqProduto = fopen("produtos.txt", "r") or die ("ERROR ao abrir arquivo");
    $arqAux = fopen("auxiliar.txt", "w") or die ("ERROR ao abrir arquivo");

    $auxId = $_POST["id"];

    while(!feof($arqProduto)){

        $linha = fgets($arqProduto);

        $colunaDados = explode(";", $linha);

        if(trim($colunaDados[0]) != $auxId){
            fwrite($arqAux, $linha);
        }
        
    }

    fclose($arqProduto);
    fclose($arqAux);

    // Substitui o arquivo original pelo auxiliar
    copy("auxiliar.txt", "produtos.txt");

    unlink("auxiliar.txt");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Produto</title>
</head>
<body>
    <button><a href="listarProduto.php">Voltar para lista</a></button>
</body>
</html>