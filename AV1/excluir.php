<?php

    $id = "";
    $nome = "";
    $quant = "";
    $valor = "";

    $arqCarrinho = fopen("carrinho.txt", "r") or die("ERROR ao abrir arquivo");
    $arqAux = fopen("auxiliar.txt", "w") or die("ERROR ao abrir arquivo");

    $x = 0;
    $linha[] = fgets($arqCarrinho);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Produto</title>
</head>
<body>
    
    <?php

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $auxId = $_POST["id"];

            while(!feof($arqCarrinho)){
    
                $linha[] = fgets($arqCarrinho);
    
                $colunaDados = explode(";", $linha[$x]);
    
                $id = $colunaDados[0];
                $nome = $colunaDados[1];
                $quant = $colunaDados[2];
                $valor = $colunaDados[3];
    
                if($colunaDados[0] != $auxId){
    
                    $linha = $id . ";" . $nome . ";" . $quant . ";" . $valor . "\n";
    
                    fwrite($arqAux, $linha);
                }
    
                $x++;
            }
    
            copy("auxiliar.txt", "carrinho.txt");
    
            fclose($arqCarrinho);
            fclose($arqAux);
    
            unlink("auxiliar.txt");
        }
    ?>
</body>
</html>