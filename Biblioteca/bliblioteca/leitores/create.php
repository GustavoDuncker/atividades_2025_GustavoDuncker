<?php
require_once '../config/db.php';

$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    if ($nome && $email) {
        $stmt = $conn->prepare("INSERT INTO leitores (nome, email, telefone) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $nome, $email, $telefone);
        $stmt->execute();
        header('Location: list.php');
        exit;
    } else {
        $erro = 'Preencha nome e email.';
    }
}
?>
<h2>Novo Leitor</h2>
<?php if ($erro): ?><p style="color:red;"><?= $erro ?></p><?php endif; ?>
<form method="post">
    Nome: <input name="nome" required><br>
    Email: <input name="email" required><br>
    Telefone: <input name="telefone"><br>
    <button type="submit">Salvar</button>
    <a href="list.php">Cancelar</a>
</form>
