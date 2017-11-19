<?php
    function conectarBanco(){
        $banco = mysqli_connect('localhost', 'root', 'root', 'agenda');
        return banco;
    }
 ?>
