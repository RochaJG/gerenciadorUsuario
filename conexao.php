<?php
    function conectarBanco(){
        $banco = mysqli_connect('localhost', 'root', 'root', 'sis_gerenciador') or die(mysqli_error);
        return $banco;
    }
 ?>
