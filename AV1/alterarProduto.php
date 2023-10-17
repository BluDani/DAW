<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $arqProduto = fopen("produtos.txt", "r") or die("ERROR ao abrir arquivo");
        $arqAux = fopen("auxiliar.txt", "w") or die("ERROR ao abrir arquivo");

        $novoID = $_POST["id"];
        $novoNome = $_POST["nome"];
        $novoValor = $_POST["valor"];

        $linha[] = fgets($arqProduto);

        $x = 0;

        while(!feof($arqProduto)){

            $linha[] = fgets($arqProduto);

            $colunaDados = explode(";", $linha[$x]);

            $ID = $colunaDados[0];
            $nome = $colunaDados[1];
            $valor = $colunaDados[2];

            if($ID == $novoID){

                $nome = $novoNome;
                $valor = $novoValor;

                $scriptLinha = "{$ID};{$nome};{$valor};\n";
                fwrite($arqAux, $scriptLinha);
            }
            else{

                $scriptLinha = "{$ID};{$nome};{$valor}";
                fwrite($arqAux, $scriptLinha);
            }

            $x++;
        }

        fclose($arqProduto);
        fclose($arqAux);

        // Substitui o arquivo original pelo auxiliar
        copy("auxiliar.txt", "produtos.txt");

        unlink("auxiliar.txt");


        $resposta = "OK";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Produto</title>
</head>
<body>
    <?php

        if($resposta == "OK"){

            echo "Alteração feita com sucesso!";
        } 
        else{

            echo "Algo deu errado. Tente novamente!";
        }
    ?>

    <button><a href="listarProduto.php">Voltar para Lista</a></button>

</body>
</html>