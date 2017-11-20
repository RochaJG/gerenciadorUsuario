<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <title></title>
    </head>

    <body>
        <h2>Cadastro Realizado com Sucesso</h2>

        <?php

            require '..\conexao.php';

            $banco = conectarBanco();

            $query = "SELECT MAX(matricula) FROM funcionarios";
            $resultado = mysqli_query($banco, $query);
            $ultimo_id = mysqli_fetch_assoc($resultado);
            printf('Seu número de matricula é: <b>%s</b>', $ultimo_id['MAX(matricula)']);

            ?>
        <br>
        <br>
        <a href="..\Login\login.html">Ir para a página de login</a>

    </body>



</html>
