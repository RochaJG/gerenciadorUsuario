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
        <title></title>
    </head>

    <body>
        <?php
            $query = "SELECT nome FROM funcionarios WHERE matricula = '$matricula'";
            $buscar_nome = mysqli_query($banco, $query);
            $nome = mysqli_fetch_assoc($buscar_nome);
         ?>
        <h2>Marcar Horário</h2>
        <h2>Olá, <?php printf($nome['nome']); ?></h2>

        <a href="..\Atualizar\Atualizar-dados.html">Atualizar seus Dados</a>
        <br>
        <br>

        <form class="" action="tela-funcionarios.php" method="POST">
            <p id="hora" name="hora"></p>
            <button type="button" name="btnChegada">Cheguei</button>
            <button type="button" name="btnSaida">Sai</button>
        </form>
    </body>

    <script type="text/javascript">
        let time = function(){
            setInterval(function(){
                let data = new Date();
                let mes = data.getMonth();
                let hora = data.getHours();
                let minutos = data.getMinutes();
                let segundos = data.getSeconds();

                let horario = hora + ':' + minutos + ':' + segundos + ', em ' + meses[mes];

                document.getElementById('hora').innerHTML = horario;
            }, 1000);
        }

        time();

        let meses = {
            0:'Janeiro',
            1:'Fevereiro',
            2:'Março',
            3:'Abril',
            4:'Maio',
            5:'Junho',
            6:'Julho',
            7:'Agosto',
            8:'Setembro',
            9:'Outubro',
            10:'Novembro',
            11:'Dezembro'
        };
    </script>
</html>
