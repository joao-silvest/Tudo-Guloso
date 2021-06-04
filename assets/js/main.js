function addIngredientField() {
    var options_ingredientes = document.getElementsByClassName('select-ingredient-post');
    var options_ingredientes = options_ingredientes[options_ingredientes.length - 1].innerHTML;
    var options_un_medida = document.getElementById('options_unMedida').innerHTML;
    var options_tipo_ingred = document.getElementById('options_tipo_ingred').innerHTML;
    var listaIngredientes = document.getElementById('ingredients-options');
    var adicionar = document.createElement('div')
    adicionar.innerHTML = "<div class='d-flex'> <select name='select-ingredientes-duplicate' class='form-select mr-3 select-ingredient-post' aria-label='Default select example' style='width: 30%;'>" + options_ingredientes + "</select> <input class='mr-3 input-qtd-post' name='qtd' type='number' id='qtd' placeholder='' style='width: 15%;'> <select class='form-select mr-3 select-unmedida-post' aria-label='Default select example' style='width: 30%;'>" + options_un_medida + "</select> <select class='form-select mr-3 select-tipo-post' aria-label='Default select example' style='width: 25%;'>" + options_tipo_ingred + "</select><a class='btn add-ingredient mt-1' onclick='remove_ingrediente(this)' style='height: 35px;'>x</a></div>"
    listaIngredientes.appendChild(adicionar);
}

function remove_ingrediente(e) {
    e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);
}

function sendRecipe(nome, email, nomeReceita, porcoes, lista_ingredientes, lista_qtd, lista_unmedida, lista_tipo, imagem, modo_preparo, tipo_receita){
    $.ajax({
        url: "adiciona_receita.php",
        type: "POST",
        data: {
            nome: nome,
            email: email,
            nomeReceita: nomeReceita,
            porcoes: porcoes,
            lista_ingredientes: lista_ingredientes,
            lista_qtd: lista_qtd,
            lista_unmedida: lista_unmedida,
            lista_tipo: lista_tipo,
            imagem: imagem,
            modo_preparo: modo_preparo,
            tipo_receita: tipo_receita
        },
    })
    .done(function(data) {
        alert(data);
        document.location.reload();

    })
    .fail(function(jqXHR, textStatus, msg) {
        alert("Ocorreu um erro e o ingrediente não foi adicionado");
    });
}

function converterImagembase64() {
    var fileInput = document.getElementById('imagem_input');
    if(fileInput.value == ""){
        alert("Selecione uma imagem e clique no botão carregar!");
        return
    }
    console.log(fileInput)
    var reader = new FileReader();
    var codBase64;
    reader.readAsDataURL(fileInput.files[0]);

    reader.onload = function () {
        var b64 = reader.result;
        //console.log(b64);
        var inputbase64 = document.getElementById('text_b64');
        inputbase64.value = b64;
        alert("Imagem carregada com sucesso!");
    };

    reader.onerror = function (error) {
        console.log('Error: ', error);
        codBase64 = "erro";
    };
    return codBase64;
}

function insertRecipe() {
    var nome = document.getElementById('name').value;
    if(nome == ""){
        alert("Preencha o campo nome.");
        return
    }
    var email = document.getElementById('email').value;
    if(email == ""){
        alert("Preencha o campo e-mail.");
        return
    }
    
    var nomeReceita = document.getElementById('nameRec').value;
    if(nomeReceita == ""){
        alert("Preencha o título da receita.");
        return
    }
    
    var porcoes = document.getElementById('porcoes').value;
    if(porcoes == "0"){
        alert("Selecione quantas porções a receita rende");
        return
    }

    var tipo_receita = document.getElementById('select-tipo-receita').value;
    if(tipo_receita == "0"){
        alert("Selecione a categoriad da receita");
        return
    }
    
    var lista_ingredientes = $('select.select-ingredient-post').map(function(){
        return this.value
    }).get()
    
    var lista_qtd = $('input.input-qtd-post').map(function(){
        return this.value
    }).get()
    
    var lista_unmedida = $('select.select-unmedida-post').map(function(){
        return this.value
    }).get()
    

    var lista_tipo = $('select.select-tipo-post').map(function(){
        return this.value
    }).get()
    
    //var imagemb64 = converterImagembase64();
    var imagem = document.getElementById('text_b64').value;
    if(imagem == ""){
        alert("Selecione uma imagem e clique no botão carregar!")
        return
    }

    var modo_preparo = document.getElementById('comoFazer').value;
    sendRecipe(nome, email, nomeReceita, porcoes, lista_ingredientes, lista_qtd, lista_unmedida, lista_tipo, imagem, modo_preparo, tipo_receita);
    
}