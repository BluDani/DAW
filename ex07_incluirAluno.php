<?php
    $msg = "";
    
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
            Nome: <input type="text" name="Nome">
            <br><br>

            Matrícula: <input type="text" name="Matricula">
            <br><br>

            Data nasc: <input type="date" name="data">
            <br><br>

            <input type="submit" value="Criar Aluno">
        </form>
    </body>
</html>
