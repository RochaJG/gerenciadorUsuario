<?php
    require('..\conexao.php');

    $matricula = $_POST['matricula'];
    $senha = MD5($_POST['senha']);

    $banco = conectarBanco();

    $buscar = "SELECT * FROM funcionarios WHERE matricula = '$matricula' AND senha = '$senha'";
    $resultado = mysqli_query($banco, $buscar);

    if(mysqli_num_rows($resultado) == 1){
        header('Location:atualizar-dados.html');
    } else {
        echo '<script>
                alert("Matrícula ou senha estão incorretos");
                history.back();
              </script>';
    }

    mysqli_close($banco);

 ?>
