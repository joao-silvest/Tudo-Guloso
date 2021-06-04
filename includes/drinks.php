<?php
$consulta_salgados = "SELECT id_receita, titulo_receita, imagem FROM receita WHERE aprovada = 1 AND tipo_receita_id = 3 ORDER BY titulo_receita";
$resultado_salgados = mysqli_query($conexao, $consulta_salgados);
if (!$consulta_salgados) {
    echo "Deu ruim!";
    die("Falha na consulta do Banco de Dados");
}
?>

<div class="row">
    <div class="col-lg-12">
        <div>
            <div class="col-lg-12">
                <?php
                while ($salgados = mysqli_fetch_assoc($resultado_salgados)) {
                    base64_decode($salgados["imagem"]);
                    echo "<div class='col-lg-12'>";
                    echo "<div class='tab-item'>";
                    echo "<img src='data:image/gif;base64," . $salgados["imagem"] . "' style='width: 100px; height: 100px;'/>";
                    echo "<h4>" . $salgados["titulo_receita"] . "</h4>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
        </div>
    </div>
</div>