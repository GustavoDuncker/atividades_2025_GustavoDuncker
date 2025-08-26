<?php
require_once '../config/db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: list.php');
    exit;
}
$stmt = $conn->prepare("SELECT * FROM emprestimos WHERE id_emprestimo=?");
$stmt->bind_param('i', $id);
$stmt->execute();
$emprestimo = $stmt->get_result()->fetch_assoc();
if (!$emprestimo) {
    header('Location: list.php');
    exit;
}
$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data_devolucao = $_POST['data_devolucao'];
    if ($data_devolucao < $emprestimo['data_emprestimo']) {
        $erro = 'A data de devolução não pode ser anterior à data de empréstimo.';
    } else {
        $stmt = $conn->prepare("UPDATE emprestimos SET data_devolucao=? WHERE id_emprestimo=?");
        $stmt->bind_param('si', $data_devolucao, $id);
        $stmt->execute();
        header('Location: list.php');
        exit;
    }
}
?>
<h2>Devolver Empréstimo</h2>
<?php if ($erro): ?><p style="color:red;"> <?= $erro ?> </p><?php endif; ?>
<form method="post">
    Data de Empréstimo: <input value="<?= $emprestimo['data_emprestimo'] ?>" disabled><br>
    Data de Devolução: <input name="data_devolucao" type="date" value="<?= date('Y-m-d') ?>" required><br>
    <button type="submit">Salvar</button>
    <a href="list.php">Cancelar</a>
</form>
