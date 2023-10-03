<?php

    $id = "";
    $nome = "";
    $valor = "";

    $arqProduto = fopen("produtos.txt", "r") or die("ERROR ao abrir arquivo");

    $x = 0;
    $linha[] = fgets($arqProduto); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="myStyle.css">
    <title>Listar Produto</title>
</head>
<body>
    
    <h1>Produtos</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Opção</th>
        </tr>

        <?php

            while(!feof($arqProduto)){

                $linha[] = fgets($arqProduto);

                $colunaDados = explode(";", $linha[$x]);

                $id = $colunaDados[0];
                $nome = $colunaDados[1];
                $valor = $colunaDados[2];

                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$nome</td>";
                echo "<td>R$ $valor</td>";
                echo "<td> 
                <form action='adicionarCarrinho.php' method='POST'>
                    <input type='hidden' name='id' value='$id'>
                    <input type='hidden' name='nome' value='$nome'>
                    <input type='hidden' name='valor' value='$valor'>
                    <input type='number' name='quant' id='quant'>
                    <input type='submit' value='Adicionar'>
                </form> </td>";
                echo "</tr>";

                $x++;
            }

            fclose($arqProduto);
        ?>
    </table>

    <br><br>

    <h2>Vizualicar seu carrinho</h2>
    <button><a href="listarCarrinho.php">Carrinho</a></button>

</body>
</html>