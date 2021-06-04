<?php
    require_once("includes/connection.php");
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $nomeReceita = $_POST['nomeReceita'];
    $porcoes = $_POST['porcoes'];
    $lista_ingredientes = $_POST['lista_ingredientes'];
    $lista_qtd = $_POST['lista_qtd'];
    $lista_unmedida = $_POST['lista_unmedida'];
    $lista_tipo = $_POST['lista_tipo'];
    $imagem = explode(",", $_POST['imagem']);
    $modo_preparo = $_POST['modo_preparo'];
    $tipo_receita = $_POST['tipo_receita'];

    $query1 = "INSERT INTO autor (nome_autor, email_autor) VALUES ('$nome', '$email')";
    $resultado1 = mysqli_query($conexao, $query1);
    if(!$resultado1){
        $query1 = "SELECT id_autor FROM autor WHERE nome_autor = '$nome' or email_autor = '$email'";
        $resultado1 = mysqli_query($conexao, $query1);
        $autor_id = $resultado1;
    }else{
        $autor_id = mysqli_insert_id($conexao);
    }

    $query2 = "INSERT INTO receita (titulo_receita, modo_preparo, imagem, aprovada, usuarios_id_usuario, porcoes, tipo_receita_id) VALUES ('$nomeReceita', '$modo_preparo', '$imagem[1]', 0, 1, '$porcoes', '$tipo_receita')";
    $resultado2 = mysqli_query($conexao, $query2);
    $receita_id = mysqli_insert_id($conexao);

    for($i = 0; $i < count($lista_ingredientes); $i++){
        $query3 = "INSERT INTO receita_ingrediente (receita_id_receita, ingrediente_id_ingrediente, quantidade, medida_id_medida, tipo_ingrediente_id_tipo) VALUES ('$receita_id', '$lista_ingredientes[$i]', '$lista_qtd[$i]', '$lista_unmedida[$i]', '$lista_tipo[$i]')";
        $resultado3 = mysqli_query($conexao, $query3);
    }
    echo "Receita enviada com sucesso para avaliação da administração! Assim que aprovado, ela aparecerá em nosso site! obrigado! :)";
