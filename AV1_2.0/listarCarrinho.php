<?php

    $id = "";
    $nome = "";
    $quant = "";
    $valor = "";
    $total = 0;

    $arqCarrinho = fopen("carrinho.txt", "r") or die("ERROR ao abrir arquivo");

    $x = 0;
    $linha[] = fgets($arqCarrinho);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="myStyle.css">
    <title>Listar Carrinho</title>
</head>
<body>

    <h1>Carrinho</h1>
    
    <table>

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Valor</th>
            <th>Sub-total</th>
            <th>Excluir</th>

        </tr>

        <?php

            while(!feof($arqCarrinho)){

                $linha[] = fgets($arqCarrinho);

                $colunaDados = explode(";", $linha[$x]);

                $id = $colunaDados[0];
                $nome = $colunaDados[1];
                $quant = $colunaDados[2];
                $valor = $colunaDados[3];

                $subTotal = $quant * $valor;
                $total += $subTotal;

                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$nome</td>";
                echo "<td>$quant</td>";
                echo "<td>R$ $valor</td>";
                echo "<td>R$ $subTotal</td>";
                echo "<td> 
                <form action='excluirCarrinho.php' method='POST'>
                    <input type='hidden' name='id' value='$id'>
                    <input type='submit' value='Excluir'>
                </form> </td>";
                echo "</tr>";

                $x++;
            }

            fclose($arqCarrinho);
        ?>
    </table>

    <br><br>
    <table>
        <tr>
            <th>Total</th>
        </tr>

        <tr>
            <td>R$ <?php echo $total?></td>
        </tr>
    </table>

    <br>

    <h2>Deseja adicionar mais produtos?</h2>
    <button><a href="listarProduto.php">Sim</a></button>
</body>
</html>