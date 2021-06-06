<?php require_once("includes/connection.php");
$id = $_POST['id'];
$receitas = "SELECT t.nome_ingrediente, i.quantidade, m.nome_medida, a.nome_tipo
FROM receita_ingrediente i 
INNER JOIN ingrediente t ON i.ingrediente_id_ingrediente = t.id_ingredientes
INNER JOIN medida m ON  i.medida_id_medida = m.id_medida
INNER JOIN tipo_ingrediente a ON i.tipo_ingrediente_id_tipo = a.id_tipo
WHERE i.receita_id_receita = {$id}";

$resultado = mysqli_query($conexao, $receitas);

while ($linha = mysqli_fetch_assoc($resultado)) {
    $rows[] = $linha;
}
echo json_encode($rows);
?>

