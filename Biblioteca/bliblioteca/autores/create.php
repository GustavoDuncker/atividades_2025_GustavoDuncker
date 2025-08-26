<?php
require_once '../config/db.php';

$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $nacionalidade = trim($_POST['nacionalidade']);
    $ano_nascimento = intval($_POST['ano_nascimento']);
    if ($nome && $ano_nascimento > 0) {
        $stmt = $conn->prepare("INSERT INTO autores (nome, nacionalidade, ano_nascimento) VALUES (?, ?, ?)");
        $stmt->bind_param('ssi', $nome, $nacionalidade, $ano_nascimento);
        $stmt->execute();
        header('Location: list.php');
        exit;
    } else {
        $erro = 'Preencha todos os campos obrigatórios.';
    }
}
?>
<h2>Novo Autor</h2>
<?php if ($erro): ?><p style="color:red;"><?= $erro ?></p><?php endif; ?>
<form method="post">
    Nome: <input name="nome" required><br>
    Nacionalidade: <input name="nacionalidade"><br>
    Ano de Nascimento: <input name="ano_nascimento" type="number" min="1000" max="<?= date('Y') ?>" required><br>
    <button type="submit">Salvar</button>
    <a href="list.php">Cancelar</a>
</form>
