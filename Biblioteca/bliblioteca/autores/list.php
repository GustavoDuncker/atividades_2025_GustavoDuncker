<?php
require_once '../config/db.php';

$sql = "SELECT * FROM autores ORDER BY nome";
$result = $conn->query($sql);
?>
<h2>Autores</h2>
<a href="create.php">Novo Autor</a>
<table border="1">
<tr><th>ID</th><th>Nome</th><th>Nacionalidade</th><th>Ano Nascimento</th><th>Ações</th></tr>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['id_autor'] ?></td>
    <td><?= htmlspecialchars($row['nome']) ?></td>
    <td><?= htmlspecialchars($row['nacionalidade']) ?></td>
    <td><?= $row['ano_nascimento'] ?></td>
    <td>
        <a href="update.php?id=<?= $row['id_autor'] ?>">Editar</a> |
        <a href="delete.php?id=<?= $row['id_autor'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
