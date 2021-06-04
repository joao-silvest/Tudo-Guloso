<?php

$nome = $_GET['nome'];
$email = $_GET['email'];
$receita = $_GET['receita'];
$porcoes = $_GET['porcoes'];
$ingredientes = $_GET['ingredientes'];
$modoPreparo = $_GET['modoPreparo'];
$imagem = $_GET['imagem'];

$query = "INSERT INTO receitas values (tituloReceita, porcoes, modoPreparo, imagem) values ('{$receita}', '{$porcoes}', '{$modoPreparo}', '{$imagem}')";
mysqli_query($conexao, $query);