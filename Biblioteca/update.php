<?php

include 'dbG.php';

$id = $_GET['id'];

if ($_POST){

$name = $_POST['nome'];
$nascionalidade = $_POST['nascionalidade'];
$ano = $_POST['ano'];

$conn->query("UPDATE autores SET nome='$nome', nacionalidade='$nacionalidade', ano_nascimento=$ano WHERE id_autor=$id");
    echo "Autor atualizado!";
}

$res = $conn->query("SELECT * FROM autores WHERE id_autor=$id");
$a = $res->fetch_assoc();

?>

<form method="post">
    Nome: <input name="nome" value="<?= $a['nome'] ?>"><br>
    Nacionalidade: <input name="nacionalidade" value="<?= $a['nacionalidade'] ?>"><br>
    Ano: <input name="ano" type="number" value="<?= $a['ano_nascimento'] ?>"><br>
    <button type="submit">Salvar</button>
</form>