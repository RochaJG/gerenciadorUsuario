<?php
    session_start();
    $matricula = $_SESSION['matricula'];
    require '..\conexao.php';
    $banco = conectarBanco();
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
            $query = "SELECT nome FROM funcionarios WHERE matricula = '$matricula'";
            $buscar_nome = mysqli_query($banco, $query);
            $nome = mysqli_fetch_assoc($buscar_nome);
         ?>
         <h2>Olá, <?php printf($nome['nome']); ?></h2>
         <a href="..\Atualizar\Atualizar-dados.html" >Atualizar seus Dados</a>
         <a href="..\Cadastro\cadastro.html">Cadastrar novo funcionário</a>

         <form class="" action="..\enviar-hora.php" method="GET">
             <p id="hora" name="hora"></p>
             <button type="submit" name="btnChegada"><a href="..\enviar-hora.php?btnChegada=1">Cheguei</a></button>
             <button type="button" name="btnSaida"><a href="..\enviar-hora.php?btnSaida=1">Sai</a></button>
         </form>
         <br>

        <h2>Funcionários</h2>
        <?php
            $buscar = "SELECT * FROM funcionarios";
            $funcionarios = mysqli_query($banco, $buscar);

            while($tupla = mysqli_fetch_assoc($funcionarios)){
                $id = $tupla['matricula'];
                if($tupla['cargo'] == 'gerente'){
                    continue;
                }

                $horario_entrada = pegarEntradas($banco, $id);
                $horario_saida = pegarSaidas($banco, $id);

                printf("<b>Funcionário</b>: %s %s <b>Cargo</b>: %s <b>Entrada</b>: %s <b>Saída</b>: %s <br>",
                $tupla['nome'], $tupla['sobrenome'], $tupla['cargo'], $horario_entrada, $horario_saida);
            }

            function pegarEntradas($banco, $id){
                $buscar_entradas = "SELECT horario FROM entradas WHERE mat_func = $id
                                    AND date(horario) = curdate()";
                $result_entradas = mysqli_query($banco, $buscar_entradas);

                if(mysqli_num_rows($result_entradas)){
                    $horario_entrada = mysqli_fetch_assoc($result_entradas)['horario'];
                } else {
                    $horario_entrada = 'Ainda não entrou';
                }

                return $horario_entrada;
            }

            function pegarSaidas($banco, $id){
                $buscar_saidas = "SELECT horario FROM saidas WHERE mat_func = $id
                                  AND date(horario) = curdate()";

                $result_saidas = mysqli_query($banco, $buscar_saidas);

                if(mysqli_num_rows($result_saidas)){
                    $horario_saida = mysqli_fetch_assoc($result_saidas)['horario'];
                } else {
                    $horario_saida = 'Ainda não saiu';
                }

                return $horario_saida;
            }
         ?>
    </body>

    </html>
