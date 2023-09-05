<?php

    $nome = "";
    $matricula = "";
    $email = "";

    $arqAluno = fopen("alunos.txt", "r") or die("erro ao criar arquivo");

    $linhas[] = fgets($arqAluno);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Buscar</title>
</head>
<body>
    <h1>Buscar Aluno</h1>

    <form action="ex08_buscar.php" method="POST">

        Buscar Matrícula: <input type="text" name="busca">
        <br><br>

        <input type="submit" value="Buscar">
    </form>

    <br>

    <table>

    <tr>
        <th>Nome</th>
        <th>Matrícula</th>
        <th>Email</th>
    </tr>

    <?php

        $busca = $_POST["busca"];
        $escolha = $_POST["escolha"];
        
        $x = 0;
        while(!feof($arqAluno)){

            $linhas[] = fgets($arqAluno);
            
            $colunaDados = explode(";", $linhas[$x]);
            
            $matricula = $colunaDados[1];
            
            if($busca == $matricula){
                
                $nome = $colunaDados[0];
                $email = $colunaDados[2];

                echo "<tr>";
                echo "<td>" . $nome . "</td>";
                echo "<td>" . $matricula . "</td>";
                echo "<td>" . $email . "</td>";
                echo "</tr>";
            }

            $x++;
        }

        fclose(arqAluno);
    ?>

    </table>
    
</body>
</html>
