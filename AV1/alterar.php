<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>

    <link rel="stylesheet" href="myStyle.css">
</head>
<body>
    <?php

        $ID = $_POST["id"];
        $nome = $_POST["nome"];
        $valor = $_POST["valor"];
    ?>

    <form action="alterarProduto.php" method="POST">

        ID <input type="text" id="id" name="id" value = "<?php echo $ID; ?>">
        <br><br>

        Nome <input type="text" id="nome" name="nome" value = "<?php echo $nome; ?>">
        <br><br>

        valor <input type="text" id="valor" name="valor" value = "<?php echo $valor; ?>">
        <br><br>

        <input type="submit" value="Alterar Produto">

    </form>
</body>
</html>