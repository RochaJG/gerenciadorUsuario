<?php
    session_start();

    require('..\conexao.php');

    $matricula = $_SESSION['matricula'];
    $banco = conectarBanco();

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $senha = MD5($_POST['senha']);


    if(!empty($_POST['nome'])){
        $atualizar = "UPDATE funcionarios SET nome = '$nome' WHERE matricula = '$matricula'";
        $resultado = mysqli_query($banco, $atualizar);
    }
    if(!empty($_POST['sobrenome'])){
        $atualizar = "UPDATE funcionarios SET sobrenome = '$sobrenome' WHERE matricula = '$matricula'";
        $resultado = mysqli_query($banco, $atualizar);
    }
    if(!empty($_POST['senha'])){
        $atualizar = "UPDATE funcionarios SET senha = '$senha' WHERE matricula = '$matricula'";
        $resultado = mysqli_query($banco, $atualizar);
    }

    mysqli_close($banco);

    session_destroy();

    header('Location:atualizar-sucesso.html');
 ?>
