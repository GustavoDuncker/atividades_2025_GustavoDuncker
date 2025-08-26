<?php
include 'dbG.php';
$id = $_GET['id'];

$conn->query("DELETE FROM autores WHERE id_autor = $id");

echo "Autor excluído!";
echo "<br><a href='listar.php'>Voltar</a>";
?>