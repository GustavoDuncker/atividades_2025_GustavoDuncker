<?php
require_once '../config/db.php';

$sql = "SELECT * FROM leitores ORDER BY nome";
$result = $conn->query($sql);
?>
<h2>Leitores</h2>
<a href="create.php">Novo Leitor</a>
<table border="1">
<tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Ações</th></tr>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['id_leitor'] ?></td>
    <td><?= htmlspecialchars($row['nome']) ?></td>
    <td><?= htmlspecialchars($row['email']) ?></td>
    <td><?= htmlspecialchars($row['telefone']) ?></td>
    <td>
        <a href="update.php?id=<?= $row['id_leitor'] ?>">Editar</a> |
        <a href="delete.php?id=<?= $row['id_leitor'] ?>" onclick="return confirm('Excluir?')">Excluir</a> |
        <a href="../emprestimos/list.php?leitor=<?= $row['id_leitor'] ?>">Ver Empréstimos</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
