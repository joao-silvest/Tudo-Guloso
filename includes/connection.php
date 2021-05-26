<?php
    
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "tudo_guloso";

    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

    //passo 2
    if(mysqli_connect_errno()){
        die("Conexão falhou: " .mysqli_connect_errno());
    }