<?php
    session_start();
    $matricula = $_SESSION['matricula'];

    require('conexao.php');

    $banco = conectarBanco();

    if(isset($_GET['btnChegada']) == 1){

        $inserir = "INSERT INTO entradas(mat_func, horario)
                   VALUES('$matricula', now())";

        $resultado = mysqli_query($banco, $inserir) or die( "Erro na consulta: " . mysqli_error($banco) );

        if($resultado){
            if(isset($_SESSION['cargo'])){
                echo '<h3>Horário de entrada inserido</h3>';
                echo '<a href="Gerente\tela-gerente.php">Voltar a página inicial</a>';
            } else {
                echo '<h3>Horário de entrada inserido</h3>';
                echo '<a href="Login\login.html">Voltar a página inicial</a>';
            }
        }

    } else if(isset($_GET['btnSaida']) == 1){
        $inserir = "INSERT INTO saidas(mat_func, horario)
                   VALUES('$matricula', now())";

        $resultado = mysqli_query($banco, $inserir) or die( "Erro na consulta: " . mysqli_error($banco) );

        if($resultado){
            echo '<h3>Horário de saida inserido</h3>';
            echo '<a href="Login\login.html">Voltar a página inicial</a>';
        }
    }

     mysqli_close($banco);
 ?>
