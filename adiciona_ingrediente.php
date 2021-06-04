<?php
require_once("includes/connection.php");
        $query = "INSERT INTO ingrediente (nome_ingrediente) VALUES ('$_POST[ingrediente]')";
        $resultado = mysqli_query($conexao, $query);
        $last_id = mysqli_insert_id($conexao);

        echo $last_id;
?>