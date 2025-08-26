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
    $nacionalidade = trim($_POST['nacionalidade']);
    $ano_nascimento = intval($_POST['ano_nascimento']);
    if ($nome && $ano_nascimento > 0) {
        $stmt = $conn->prepare("UPDATE autores SET nome=?, nacionalidade=?, ano_nascimento=? WHERE id_autor=?");
        $stmt->bind_param('ssii', $nome, $nacionalidade, $ano_nascimento, $id);
        $stmt->execute();
        header('Location: list.php');
        exit;
    } else {
        $erro = 'Preencha todos os campos obrigatórios.';
    }
}
$stmt = $conn->prepare("SELECT * FROM autores WHERE id_autor=?");
$stmt->bind_param('i', $id);
$stmt->execute();
$autor = $stmt->get_result()->fetch_assoc();
if (!$autor) {
    header('Location: list.php');
    exit;
}
?>
<h2>Editar Autor</h2>
<?php if ($erro): ?><p style="color:red;"> <?= $erro ?> </p><?php endif; ?>
<form method="post">
    Nome: <input name="nome" value="<?= htmlspecialchars($autor['nome']) ?>" required><br>
    Nacionalidade: <input name="nacionalidade" value="<?= htmlspecialchars($autor['nacionalidade']) ?>"><br>
    Ano de Nascimento: <input name="ano_nascimento" type="number" min="1000" max="<?= date('Y') ?>" value="<?= $autor['ano_nascimento'] ?>" required><br>
    <button type="submit">Salvar</button>
    <a href="list.php">Cancelar</a>
</form>
