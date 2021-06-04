<?php require_once("includes/connection.php");

$receitas = "SELECT titulo_receita, modo_preparo, imagem FROM receita where id_receita  = 25";
$resultado = mysqli_query($conexao, $receitas);

while ($linha = mysqli_fetch_assoc($resultado)) {
echo $linha["titulo_receita"];
base64_decode($linha["imagem"]);
echo '<img src="data:image/gif;base64,' . $linha["imagem"] . '" />';
}

?>

