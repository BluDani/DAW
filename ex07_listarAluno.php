<?php

    $nome = "";
    $matricula = "";
    $data = "";
    $msg = "";

    $arquivoAlunoIn = fopen("alunos.txt", "r") or die("erro ao criar arquivo");

    $x = 0;
    $linhas[] = fgets($arquivoAlunoIn);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listar Aluno</title>
    </head>

    <body>
    <h1>Criar Nova Aluno</h1>
    <table>
    <tr>
        <th>Nome</th>
        <th>Matrícula<th>
        <th>Data nasc<th>
    </tr>
    <?php

    while (!feof($arquivoAlunoIn)){

        $linhas[] = fgets($arquivoAlunoIn);
        $colunaDados = explode(";", $linhas[$x]);
        $nome = $colunaDados[0];
        $matricula = $colunaDados[1];
        $data = $colunaDados[2];
        echo "<tr>";
        echo "<td>" . $nome . "</td>";
        echo "<td>" . $matricula . "</td>";
        echo "<td>" . $data . "</td>";
        echo "</tr>";

        $x++;
    }

    fclose($arquivoAlunoIn);
    ?>

    </table>
    
    <p><?php echo $msg ?></p>
    <br>
    </body>
</html>
