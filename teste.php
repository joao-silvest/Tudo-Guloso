<?php require_once("includes/connection.php");

$receitas = "SELECT tituloReceita, modoPreparo, imagem FROM receitas where idReceitas = 1";
$resultado = mysqli_query($conexao, $receitas);

while ($linha = mysqli_fetch_assoc($resultado)) {
echo $linha["tituloReceita"];
base64_decode($linha["imagem"]);
echo '<img src="data:image/gif;base64,' . $linha["imagem"] . '" />';
}

?>

