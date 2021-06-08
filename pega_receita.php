<?php
require_once("includes/connection.php");

$id = $_POST['id'];

$consulta = "SELECT id_receita, titulo_receita, imagem, modo_preparo, visualizacoes FROM receita WHERE id_receita = {$id}";
$resultado = mysqli_query($conexao, $consulta);
if (!$consulta) {
    die("Falha na consulta do Banco de Dados");
    //echo mysqli_error($conexao);
}

header('Content-Type: application/json');
while ($linha = mysqli_fetch_assoc($resultado)) {
    $rows[] = $linha;
    $views = $linha['visualizacoes'];

}

echo json_encode($rows);

$new_views = $views + 1;

$update_views = "UPDATE receita SET visualizacoes = {$new_views} WHERE id_receita = {$id}";
$insercao = mysqli_query($conexao, $update_views);
if (!$insercao) {
    die("Falha na consulta do Banco de Dados");
    //echo mysqli_error($conexao);
}