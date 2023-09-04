<?php
    $msg = "";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $nome = $_POST["nome"];
        $matricula = $_POST["matricula"];
        $data = $_POST["data"];

        $msg = "";

        echo "Nome: " . $nome . "Matrícula: " . $matricula . "Data nasc: " . $data . "\n";

        $arqDisc = fopen("alunos.txt", "a") or die ("Erro ao criar arquivo");
        $linha = "nome;matricula;data\n";
        $linha = $nome . ";" . $matricula . ";" . $data . "\n";

        fwrite($arqDisc, $linha);
        fclose($arqDisc);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h1>Novo Aluno</h1>

        <form action="ex07_incluirAluno.php" method="POST">
            Nome: <input type="text" name="nome">
            <br><br>

            Matrícula: <input type="text" name="matricula">
            <br><br>

            Data nasc: <input type="date" name="data">
            <br><br>

            <input type="submit" value="Criar Aluno">
        </form>

        <p><?php echo  $msg ?></p>
    </body>
</html>
