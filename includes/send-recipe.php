<?php
$consulta_ingredientes = "SELECT id_ingredientes, nome_ingrediente FROM ingrediente ORDER BY nome_ingrediente";
$resultado_ingredientes = mysqli_query($conexao, $consulta_ingredientes);
if (!$resultado_ingredientes) {
    die("Falha na consulta do Banco de Dados");
}

$consulta_medidas = "SELECT id_medida, nome_medida FROM medida ORDER BY nome_medida";
$resultado_medidas = mysqli_query($conexao, $consulta_medidas);
if (!$resultado_medidas) {
    die("Falha na consulta do Banco de Dados");
}

$consulta_tipo_ingrediente = "SELECT id_tipo, nome_tipo FROM tipo_ingrediente ORDER BY nome_tipo";
$resultado_tipo_ingrediente = mysqli_query($conexao, $consulta_tipo_ingrediente);
if (!$resultado_tipo_ingrediente) {
    die("Falha na consulta do Banco de Dados");
}

$consulta_tipo_receita = "SELECT id_tipo_receita, tipo_refceita_nome FROM tipo_receita ORDER BY tipo_refceita_nome";
$resultado_tipo_receita = mysqli_query($conexao, $consulta_tipo_receita);
if (!$resultado_tipo_receita) {
    die("Falha na consulta do Banco de Dados");
}
?>

<section class="section" id="send-recipe">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 align-self-center">
                <div class="left-text-content">
                    <div class="section-heading">
                        <h6>Envie sua receita</h6>
                        <h2>Preencha seus dados e insira os detalhes da sua receita</h2>
                    </div>

                </div>
            </div>
            <div class="col-lg-8">
                <div class="contact-form">
                    <div id="contact">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Cadastro da receita</h4>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <input name="name" type="text" id="name" placeholder="Digite seu nome*">
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Digite seu email">
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <input name="nameRec" type="text" id="nameRec" placeholder="Digite o nome da receita*">
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <fieldset>
                                    <select value="porcoes" name="porcoes" id="porcoes">
                                        <option value="0">Quantas porções rende</option>
                                        <option name="1" id="1">1</option>
                                        <option name="2" id="2">2</option>
                                        <option name="3" id="3">3</option>
                                        <option name="4" id="4">4</option>
                                        <option name="5" id="5">5</option>
                                        <option name="6" id="6">6</option>
                                        <option name="7" id="7">7</option>
                                        <option name="8" id="8">8</option>
                                        <option name="9" id="9">9</option>
                                        <option name="10" id="10">10</option>
                                        <option name="11" id="11">11</option>
                                        <option name="12" id="12">12</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <select id="select-tipo-receita" class="form-select">
                                    <option value="0">Escolha o tipo de receita</option>
                                    <?php
                                    while ($tipo_receita = mysqli_fetch_assoc($resultado_tipo_receita)) {
                                        echo "<option value=" . $tipo_receita['id_tipo_receita'] . ">" . $tipo_receita['tipo_refceita_nome'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-lg-12 add-ingrediente-div" style="text-align: right !important;">
                                <fieldset id="ingredients-options">
                                    <div class="d-flex mt-3" style="text-align: left;">
                                        <div class="mr-3" style="width: 30%;">Ingrediente</div>
                                        <div class="mr-3" style="width: 15%;">Qtd</div>
                                        <div style="width: 30%;">Un. Medida</div>
                                        <div style="width: 20%;">Tipo</div>
                                    </div>
                                    <div>
                                        <div class="d-flex">
                                            <select id="options_ingredientes" name="select-ingredientes-duplicate" class="form-select mr-3 select-ingredient-post" aria-label="Default select example" style="width: 30%;">
                                                <?php
                                                while ($ingrediente = mysqli_fetch_assoc($resultado_ingredientes)) {
                                                    echo "<option value=" . $ingrediente['id_ingredientes'] . ">" . $ingrediente['nome_ingrediente'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                            <input class="mr-3 input-qtd-post" name="qtd" type="number" id="qtd" placeholder="" style="width: 15%;">
                                            <select id="options_unMedida" class="form-select mr-3 select-unmedida-post" aria-label="Default select example" style="width: 30%;">
                                                <?php
                                                while ($medida = mysqli_fetch_assoc($resultado_medidas)) {
                                                    echo "<option value=" . $medida['id_medida'] . ">" . $medida['nome_medida'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                            <select id="options_tipo_ingred" class="form-select mr-3 select-tipo-post" aria-label="Default select example" style="width: 25%;">
                                                <?php
                                                while ($tipo_ingrediente = mysqli_fetch_assoc($resultado_tipo_ingrediente)) {
                                                    echo "<option value=" . $tipo_ingrediente['id_tipo'] . ">" . $tipo_ingrediente['nome_tipo'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                            <a class="btn add-ingredient mt-1" onclick="remove_ingrediente(this)" style="height: 35px;">x</a>
                                        </div>
                                    </div>
                                </fieldset>
                                Adicionar ingredientes <a class="btn add-ingredient mb-3" onclick="addIngredientField()">+</a> <br>
                                Não encontrou o ingrediente na lista? <a class="btn add-new-ingredient" data-toggle="modal" data-target="#add-ingredient-modal">Adicione</a>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <div class="d-flex">
                                        <input id="imagem_input" type="file" name="fileToUpload" accept="image/*" class="pt-2">
                                        <a class="btn add-image ml-3 mt-2" onclick="converterImagembase64()">Carregar imagem</a>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="comoFazer" rows="6" id="comoFazer" placeholder="Modo de preparo"></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submiter" class="main-button-icon" onclick="insertRecipe()">Enviar</button>
                                </fieldset>
                                <input id="text_b64" type="text" hidden>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<div class="modal fade" id="add-ingredient-modal" tabindex="-1" role="dialog" aria-labelledby="Modal para adicionar ingredientes" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicione um novo ingrediente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input name="ingrediente-nome-add" type="text" id="ingrediente-nome-add" placeholder="Digite o nome do ingrediente" style="width: 100%;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button id="send-recipe-ajax" type="button" class="btn btn-primary" onclick="recipeSend()" data-dismiss="modal">Adicionar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function recipeSend() {
        var ingrediente = $('#ingrediente-nome-add').val();
        var postdata = 'ingrediente=' + ingrediente;

        $.ajax({
                url: "adiciona_ingrediente.php",
                type: "POST",
                data: postdata,
            })
            .done(function(data) {
                alert("Ingrediente adicionado com sucesso!");
                var options_ingredientes = document.getElementsByClassName('select-ingredient-post');
                var options_ingredientes = options_ingredientes[options_ingredientes.length - 1].innerHTML;
                var options_un_medida = document.getElementById('options_unMedida').innerHTML;
                var options_tipo_ingred = document.getElementById('options_tipo_ingred').innerHTML;
                var listaIngredientes = document.getElementById('ingredients-options');
                var adicionar = document.createElement('div')
                adicionar.innerHTML = "<div class='d-flex'> <select name='select-ingredientes-to-duplicate' class='form-select mr-3 select-ingredient-post' aria-label='Default select example' style='width: 30%;'>" + options_ingredientes + " <option value='" + data + "' selected>" + ingrediente + "</option></select> <input class='mr-3 input-qtd-post' name='qtd' type='number' id='qtd' placeholder='' style='width: 15%;'> <select class='form-select mr-3 select-unmedida-post' aria-label='Default select example' style='width: 30%;'>" + options_un_medida + "</select> <select class='form-select mr-3 select-tipo-post' aria-label='Default select example' style='width: 25%;'>" + options_tipo_ingred + "</select><a class='btn add-ingredient mt-1' onclick='remove_ingrediente(this)' style='height: 35px;'>x</a></div>";
                listaIngredientes.appendChild(adicionar);

            })
            .fail(function(jqXHR, textStatus, msg) {
                alert("Ocorreu um erro e o ingrediente não foi adicionado");
            });
    }
</script>