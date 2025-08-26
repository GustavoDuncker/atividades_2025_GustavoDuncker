<?php
require_once '../config/db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: list.php');
    exit;
}
$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    if ($nome && $email) {
        $stmt = $conn->prepare("UPDATE leitores SET nome=?, email=?, telefone=? WHERE id_leitor=?");
        $stmt->bind_param('sssi', $nome, $email, $telefone, $id);
        $stmt->execute();
        header('Location: list.php');
        exit;
    } else {
        $erro = 'Preencha nome e email.';
    }
}
$stmt = $conn->prepare("SELECT * FROM leitores WHERE id_leitor=?");
$stmt->bind_param('i', $id);
$stmt->execute();
$leitor = $stmt->get_result()->fetch_assoc();
if (!$leitor) {
    header('Location: list.php');
    exit;
}
?>
<h2>Editar Leitor</h2>
<?php if ($erro): ?><p style="color:red;"><?= $erro ?></p><?php endif; ?>
<form method="post">
    Nome: <input name="nome" value="<?= htmlspecialchars($leitor['nome']) ?>" required><br>
    Email: <input name="email" value="<?= htmlspecialchars($leitor['email']) ?>" required><br>
    Telefone: <input name="telefone" value="<?= htmlspecialchars($leitor['telefone']) ?>"><br>
    <button type="submit">Salvar</button>
    <a href="list.php">Cancelar</a>
</form>
