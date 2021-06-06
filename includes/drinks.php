<?php
$consulta_salgados = "SELECT id_receita, titulo_receita, imagem FROM receita WHERE aprovada = 1 AND tipo_receita_id = 3 ORDER BY titulo_receita LIMIT 3";
$resultado_salgados = mysqli_query($conexao, $consulta_salgados);
if (!$consulta_salgados) {
    die("Falha na consulta do Banco de Dados");
}

$consulta_top_salgados = "SELECT id_receita, titulo_receita, imagem FROM receita WHERE aprovada = 1 AND tipo_receita_id = 3 ORDER BY titulo_receita DESC LIMIT 3";
$resultado_top_salgados = mysqli_query($conexao, $consulta_top_salgados);
if (!$consulta_top_salgados) {
    die("Falha na consulta do Banco de Dados");
}
?>

<div class="row" style=" width: 130%;">
    <div class="col-lg-6">
        <div class="row">
            <div class="left-list">
                <?php
                while ($salgados = mysqli_fetch_assoc($resultado_salgados)) {
                    base64_decode($salgados["imagem"]);
                    echo "<a href='#' data-toggle='modal' data-target='#exampleModal' onclick='get_recipe_info(" . $salgados['id_receita'] . ")'>";
                    echo "<div class='col-lg-12 mb-3'>";
                    echo "<div class='tab-item'>";
                    echo "<img class='img-list' src='data:image/gif;base64," . $salgados["imagem"] . "'/>";
                    echo "<h4 style='width: 100%;'>" . $salgados["titulo_receita"] . "</h4>";
                    echo "</div>";
                    echo "</div>";
                    echo "</a>";
                }
                ?>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="row">
            <div class="right-list">
                <?php
                while ($top_salgados = mysqli_fetch_assoc($resultado_top_salgados)) {
                    base64_decode($top_salgados["imagem"]);
                    echo "<a href='#' data-toggle='modal' data-target='#exampleModal' onclick='get_recipe_info(" . $top_salgados['id_receita'] . ")'>";
                    echo "<div class='col-lg-12 mb-3'>";
                    echo "<div class='tab-item'>";
                    echo "<img class='img-list' src='data:image/gif;base64," . $top_salgados["imagem"] . "'/>";
                    echo "<h4 style='width: 100%;'>" . $top_salgados["titulo_receita"] . "</h4>";
                    echo "</div>";
                    echo "</div>";
                    echo "</a>";
                }
                ?>
            </div>
        </div>
    </div>
</div>