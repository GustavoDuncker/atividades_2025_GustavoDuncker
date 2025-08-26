<?php
require_once '../config/db.php';

$filtros = [];
$valores = [];
if (!empty($_GET['genero'])) {
    $filtros[] = "genero = ?";
    $valores[] = $_GET['genero'];
}
if (!empty($_GET['id_autor'])) {
    $filtros[] = "id_autor = ?";
    $valores[] = $_GET['id_autor'];
}
if (!empty($_GET['ano_publicacao'])) {
    $filtros[] = "ano_publicacao = ?";
    $valores[] = $_GET['ano_publicacao'];
}
$sql = "SELECT l.*, a.nome AS autor FROM livros l JOIN autores a ON l.id_autor = a.id_autor";
if (count($filtros) > 0) {
    $sql .= " WHERE " . implode(" AND ", $filtros);
}
$sql .= " ORDER BY l.titulo";
$stmt = $conn->prepare($sql);
if ($valores) {
    $types = str_repeat('s', count($valores));
    $stmt->bind_param($types, ...$valores);
}
$stmt->execute();
$result = $stmt->get_result();
?>
<h2>Livros</h2>
<a href="create.php">Novo Livro</a>
<form method="GET">
    Gênero: <input name="genero">
    Autor ID: <input name="id_autor">
    Ano: <input name="ano_publicacao">
    <input type="submit" value="Filtrar">
</form>
<table border="1">
<tr><th>ID</th><th>Título</th><th>Autor</th><th>Gênero</th><th>Ano</th><th>Ações</th></tr>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['id_livro'] ?></td>
    <td><?= htmlspecialchars($row['titulo']) ?></td>
    <td><?= htmlspecialchars($row['autor']) ?></td>
    <td><?= htmlspecialchars($row['genero']) ?></td>
    <td><?= $row['ano_publicacao'] ?></td>
    <td>
        <a href="update.php?id=<?= $row['id_livro'] ?>">Editar</a> |
        <a href="delete.php?id=<?= $row['id_livro'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
