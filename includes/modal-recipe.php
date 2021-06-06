<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modal-recipe-title" class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="modal-recipe-img" src="" style="width: 100%;">
                <p class="pre-btn mt-3"> Ingredientes: </p>
                <ul class="nav justify-content-center" id="tipos-ingredientes-ul">
                    <li class="nav-item">
                        <button id="modal-geral" class="btn btn-light btn-modal" onclick="troca_ingrediente_div('geral')" style="display: none;">Principal</button>
                    </li>
                    <li class="nav-item">
                        <button id="modal-massa" class="btn btn-light btn-modal" onclick="troca_ingrediente_div('massa')" style="display: none;">Massa</button>
                    </li>
                    <li class="nav-item">
                        <button id="modal-recheio" class="btn btn-light btn-modal" onclick="troca_ingrediente_div('recheio')" style="display: none;">Recheio</button>
                    </li>
                    <li class="nav-item">
                        <button id="modal-cobertura" class="btn btn-light btn-modal" onclick="troca_ingrediente_div('cobertura')" style="display: none;">Cobertura</button>
                    </li>
                    <li class="nav-item">
                        <button id="modal-molho" class="btn btn-light btn-modal" onclick="troca_ingrediente_div('molho')" style="display: none;">Molho</button>
                    </li>
                </ul>
                <div id="divs-ingredientes">
                    <div id="massa" style="display: none;">
                    </div>
                    <div id="recheio" style="display: none;">
                    </div>
                    <div id="cobertura" style="display: none;">
                    </div>
                    <div id="molho" style="display: none;">
                    </div>
                    <div id="geral" style="display: block;">
                    </div>
                </div>
                <div id="divs-ingredientes" style="border-bottom-width: 3px;border-bottom-style: solid;border-bottom-color: #fb5849;margin-bottom: 10px;margin-top: 10px;">
                </div>
                <p class="pre-btn mt-3">Modo de preparo:</p>

                <div id="div-modo-preparo" class="mt-4"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>