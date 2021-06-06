<?php
$consulta = "SELECT id_receita, titulo_receita, imagem FROM receita WHERE receita_destaque = 1 ORDER BY titulo_receita LIMIT 6";
$resultado = mysqli_query($conexao, $consulta);
if (!$consulta) {
    die("Falha na consulta do Banco de Dados");
}

while ($receita = mysqli_fetch_assoc($resultado)) {
    $url = "data:image/gif;base64," . $receita['imagem']; 
echo "   <div class='item'>";
echo "<div class='card' style='background-image: url({$url});'>";
echo "        <div class='info'>";
echo "            <h1 class='title'>{$receita['titulo_receita']}</h1>";
echo "            <div class='main-text-button'>";
echo "                <div class='scroll-to-section'><a href='#' data-toggle='modal' data-target='#exampleModal' onclick='get_recipe_info(" . $receita['id_receita'] . ")'>Veja a receita completa <i class='fa fa-angle-down'></i></a></div>";
echo "            </div>";
echo "        </div>";
echo "    </div>";
echo "</div>";
}
?>

