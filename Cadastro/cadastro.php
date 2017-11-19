<?php
    require '..\conexao.php';

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $senha = MD5($_POST['senha']);
    $cargo = $_POST['cargos'];
    $salario = $_POST['salario'];

    $banco = conectarBanco();
    
    $inserir = "INSERT INTO funcionarios(nome, sobrenome, senha, cargo, salario)
                VALUES ('$nome', '$sobrenome', '$senha', '$cargo', '$salario')" or die(mysqli_error);

    $resultado = mysqli_query($banco, $inserir);

    if($resultado){
        header('Location:cadastro-realizado.html');
    }

    mysqli_close($banco);

 ?>
