<?php
require_once("includes/connection.php");
        $query = "INSERT INTO ingrediente (nome_ingrediente) VALUES ('$_POST[ingrediente]')";
        $resultado = mysqli_query($conexao, $query);
        if (!$resultado) {
                echo "Houve um erro, verifique se o ingrediente já não está na lista.";
                die("Falha na consulta do Banco de Dados");
            }else{
                $last_id = mysqli_insert_id($conexao);
                echo $last_id;
        }
?>