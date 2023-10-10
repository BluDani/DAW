<?php
    $arqCarrinho = fopen("carrinho.txt", "r") or die("ERROR ao abrir arquivo");
    $arqAux = fopen("auxiliar.txt", "w") or die("ERROR ao abrir arquivo");

    $auxId = $_POST["id"];

    while(!feof($arqCarrinho)){
        $linha = fgets($arqCarrinho);

        $colunaDados = explode(";", $linha);

        if(trim($colunaDados[0]) != $auxId){
            fwrite($arqAux, $linha);
        }
    }

    fclose($arqCarrinho);
    fclose($arqAux);

    // Substitui o arquivo original pelo auxiliar
    rename("auxiliar.txt", "carrinho.txt");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Produto</title>
</head>
<body>
    <button><a href="listarCarrinho.php">Voltar ao Carrinho</a></button>
</body>
</html>