<?php
    // Essa parte pega os valores passaados pelo formulário
    // $_POST é o metodo usado para enviar os valores
    // ['valor'] é o nome que é dado ao campo de entrada no formulário
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $senha = MD5($_POST['senha']); // MD5 é uma função que criptografa a senha

    // Aqui é onde é aberta uma conexão com o banco de dados
    // localhost é onde o banco se encontra,
    // Os 'root's são o login e a senha do banco respectivamente
    // agenda é o nome do banco
    $banco = mysqli_connect('localhost', 'root', 'root', 'agenda');

    // Aqui é onde é feita as consultas para saber se um username
    // e um e-mail já estão cadastrados
    $consulta_username = "SELECT username FROM usuario
                          WHERE username = '$username'";
    //mysqli_query é a função que executa os comandos SQL
    // e retorna uma espécie de array como resultado
    $resultado_username = mysqli_query($banco, $consulta_username);

    $consulta_email = "SELECT email FROM usuario
                       WHERE email = '$email'";
    $resultado_email = mysqli_query($banco, $consulta_email);

    // Aqui é testado se as consultas retornaram algum valor
    // A função mysqli_num_rows verifica o número de linhas presentes no array passaado
    // Se for maior que zero, é porque o usuário já está cadastrado
    if(mysqli_num_rows($resultado_username) > 0){
        echo '<script>
              alert("O username já existe");
              history.back();
              </script>';
              // history.back é uma função que faz o navegador voltar a página anterior
        mysqli_close($banco); // Função que fecha a conexão com o banco de dados
                              // É necessário passar o banco que deseja fechar a conexão
    }

    if(mysqli_num_rows($resultado_email) > 0){
        echo "<script>
              alert('O email já está cadastrado');
              history.back();
              </script>";
        mysqli_close($banco);
    }

    // Aqui é onde será inserido os dados no novo usuário
    if(mysqli_num_rows($resultado_username) <= 0 && mysqli_num_rows($resultado_email) <= 0){
        $inserir = "INSERT INTO usuario(nome, sobrenome, username, email, senha)
                    VALUES('$nome', '$sobrenome', '$username', '$email', '$senha')";
        $resultado_inserir = mysqli_query($banco, $inserir);
        mysqli_close($banco);

        // A função mysqli_query retorna um valor booleano,
        // se for verdadeiro é porque não ocorreu erros durante a execução
        if($resultado_inserir){
            header('Location:cadastro-realizado.html'); // Redireciona o usuário para uma outra página
            mysqli_close($banco);
        }
    }

 ?>
