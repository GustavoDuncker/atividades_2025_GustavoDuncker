<?php
require_once '../config/db.php';

$livros = $conn->query("SELECT l.id_livro, l.titulo FROM livros l LEFT JOIN emprestimos e ON l.id_livro = e.id_livro AND e.data_devolucao IS NULL WHERE e.id_emprestimo IS NULL");
$leitores = $conn->query("SELECT id_leitor, nome FROM leitores ORDER BY nome");
$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_livro = intval($_POST['id_livro']);
    $id_leitor = intval($_POST['id_leitor']);
    $data_emprestimo = $_POST['data_emprestimo'];
    $data_devolucao = $_POST['data_devolucao'] ?: null;
    $verifica = $conn->prepare("SELECT COUNT(*) FROM emprestimos WHERE id_livro=? AND data_devolucao IS NULL");
    $verifica->bind_param('i', $id_livro);
    $verifica->execute();
    $verifica->bind_result($livro_emprestado);
    $verifica->fetch();
    $verifica->close();
    $verifica2 = $conn->prepare("SELECT COUNT(*) FROM emprestimos WHERE id_leitor=? AND data_devolucao IS NULL");
    $verifica2->bind_param('i', $id_leitor);
    $verifica2->execute();
    $verifica2->bind_result($emprestimos_ativos);
    $verifica2->fetch();
    $verifica2->close();
    if ($data_devolucao && $data_devolucao < $data_emprestimo) {
        $erro = 'A data de devolução não pode ser anterior à data de empréstimo.';
    } elseif ($livro_emprestado > 0) {
        $erro = 'Este livro já está emprestado.';
    } elseif ($emprestimos_ativos >= 3) {
        $erro = 'O leitor já possui 3 empréstimos ativos.';
    } elseif ($id_livro && $id_leitor && $data_emprestimo) {
        $stmt = $conn->prepare("INSERT INTO emprestimos (id_livro, id_leitor, data_emprestimo, data_devolucao) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('iiss', $id_livro, $id_leitor, $data_emprestimo, $data_devolucao);
        $stmt->execute();
        header('Location: list.php');
        exit;
    } else {
        $erro = 'Preencha todos os campos obrigatórios.';
    }
}
?>
<h2>Novo Empréstimo</h2>
<?php if ($erro): ?><p style="color:red;"> <?= $erro ?> </p><?php endif; ?>
<form method="post">
    Livro: <select name="id_livro" required>
        <option value="">Selecione</option>
        <?php while($l = $livros->fetch_assoc()): ?>
            <option value="<?= $l['id_livro'] ?>"><?= htmlspecialchars($l['titulo']) ?></option>
        <?php endwhile; ?>
    </select><br>
    Leitor: <select name="id_leitor" required>
        <option value="">Selecione</option>
        <?php while($r = $leitores->fetch_assoc()): ?>
            <option value="<?= $r['id_leitor'] ?>"><?= htmlspecialchars($r['nome']) ?></option>
        <?php endwhile; ?>
    </select><br>
    Data Empréstimo: <input name="data_emprestimo" type="date" required><br>
    Data Devolução: <input name="data_devolucao" type="date"><br>
    <button type="submit">Salvar</button>
    <a href="list.php">Cancelar</a>
</form>
