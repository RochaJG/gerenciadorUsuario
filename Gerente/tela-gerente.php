<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <title>Gerenciamento de Funcionários</title>
    </head>

    <body>
        <h2>Funcionários</h2>
        <a href="..\Atualizar\Atualizar-login.html" >Atualizar Dados</a>
        <br>
        <br>
    </body>

    <?php
        require '..\conexao.php';

        $banco = conectarBanco();
        $buscar = "SELECT * FROM funcionarios";
        $resultado = mysqli_query($banco, $buscar);

        while($tupla = mysqli_fetch_assoc($resultado)){
            printf("<b>Funcionário</b>: %s %s <b>Cargo</b>: %s <br>",
            $tupla['nome'], $tupla['sobrenome'], $tupla['cargo']);
        }

     ?>
</html>
