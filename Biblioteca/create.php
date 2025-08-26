<?php

include 'dbG.php';

if ($_POST) {
    $nome = $_POST['nome'];
    $nacionalidade = $_POST['nacionalidade'];
    $ano = $_POST['ano'];

    $conn->query("INSERT INTO autores (nome, nacionalidade, ano_nascimento)
                  VALUES ('$nome', '$nacionalidade', $ano)");
    echo "Autor cadastrado!";
}

?>

<form method="post">
    Nome: <input name="nome">
    <br>
    Nacionalidade: <input name="nacionalidade">
    <br>
    Ano de nascimento: <input name="ano" type="number">
    <br>
    <button type="submit">Salvar</button>
</form>