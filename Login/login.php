<?php
    //Pega o login e a senha do usuario
    $login = $_POST['login'];
    $senha = MD5($_POST['senha']); // É preciso criptografar a senha para testar com a do banco

    $banco = mysqli_connect('localhost', 'root', 'root', 'agenda');

    // Procura um usuário que tenha as informações passadas no login
    $query = "SELECT * FROM usuario
              WHERE username = '$login' or email = '$login' and senha = '$senha'";

    $resultado = mysqli_query($banco, $query);

    // Se o resultado da função for igual a 1 é porque já existe um usuário cadastrado com esses dados
    if(mysqli_num_rows($resultado) == 1){
        header('Location:login-realizado.html');
        mysqli_close($banco);
    } else {
        echo '<script>
                alert("Senha e login não correspodem");
                history.back();
                </script>';
        mysqli_close($banco);
    }

 ?>
