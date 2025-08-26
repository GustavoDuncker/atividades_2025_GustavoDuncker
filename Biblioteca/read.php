<?php

include 'dbG.php';

$result = $conn->query("SELECT * FROM autores");

echo "<a href='criar.php'>Novo Autor</a><br><br>";

while ($a = $result->fetch_assoc()) {
    echo "{$a['id_autor']} - {$a['nome']} - {$a['nacionalidade']} - {$a['ano_nascimento']} ";
    echo "<a href='editar.php?id={$a['id_autor']}'>Editar</a> ";
    echo "<a href='excluir.php?id={$a['id_autor']}'>Excluir</a><br>";
}

?>
