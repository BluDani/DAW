<?php

    $nome = "";
    $matricula = "";
    $email = "";

    $arqAluno = fopen("alunos.txt", "r") or die("erro ao criar arquivo");
    $arqAux = fopen("alunos.txt", "a") or die("erro ao criar arquivo");

    $linhas[] = fgets($arqAluno);
    $linhasAux[] = fgets($arqAux);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ALterar Dado</title>
</head>
<body>
    <h1>Alterar Dado</h1>

    <form action="ex08_alterar.php" method="POST">

        Matrícula: <input type="text" name="matricula">
        <br>

        Alterar por: <input type="text" name="alterar">

        <input type="radio" name="escolha" value="1">
        <label>Nome</label>
        <br>

        <input type="radio" name="escolha" value="2">
        <label>Email</label>
        <br>

        <input type="submit" value="Alterar">

    </form>

    <?php

        $busca = $_POST["matricula"];
        $escolha = $_POST["escolha"];
        $alterar = $_POST["alterar"];

        $x == 0;

        while(!feof($arqAluno)){

            $linhas[] = fgets($arqAluno);
            $linhasAux[] = fgets($arqAux);

            $colunaDados = explode(";", $linhas[$x]);

            $nome = $colunaDados[0];
            $matricula = $colunaDados[1];
            $email = $colunaDados[2];

            if($busca == $matricula){

                if($escolha == 1){

                    $nome = $alterar;
                }
                elseif($escolha == 2){

                    $email = $alterar;
                }
                
            }
        
            $linha = $nome . ";" . $matricula . ";" . $email . "\n";
            fwrite($arqAux, $linha);
        }

        free($arqAluno);

        while(!feof($arqAux)){

            $linhasAux[] = fgets($arqAux);

            $colunaDados = explode(";", $linhas[$x]);

            $nome = $colunaDados[0];
            $matricula = $colunaDados[1];
            $email = $colunaDados[2];

            $linha = $nome . ";" . $matricula . ";" . $email . "\n";

            fwrite($arqAluno, $linha);
        }

        free($arqAux);

        fclose($arqAluno);
        fclose($arqAux);
    ?>
</body>
</html>
