<?php
    require '..\conexao.php';
    $banco = conectarBanco();
    $buscar = "SELECT * FROM funcionarios";
    $funcionarios = mysqli_query($banco, $buscar);
?>
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
        <?php
            $query = "SELECT nome FROM funcionarios WHERE cargo = 'gerente'";
            $buscar_nome = mysqli_query($banco, $query);
            $nome = mysqli_fetch_assoc($buscar_nome);
         ?>
        <h2>Funcionários</h2>
        <h2>Olá, <?php printf($nome['nome']); ?></h2>
        <a href="..\Atualizar\Atualizar-dados.html" >Atualizar seus Dados</a>
        <a href="..\Cadastro\cadastro.html">Cadastrar novo funcionário</a>
        <br>
        <br>

        <?php
            while($tupla = mysqli_fetch_assoc($funcionarios)){
                if($tupla['cargo'] == 'gerente'){
                    continue;
                }
                printf("<b>Funcionário</b>: %s %s <b>Cargo</b>: %s <br>",
                $tupla['nome'], $tupla['sobrenome'], $tupla['cargo']);
            }

         ?>

    </body>

    </html>
