<?php
require_once '../config/db.php';

$autores = $conn->query("SELECT id_autor, nome FROM autores ORDER BY nome");
$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $genero = trim($_POST['genero']);
    $ano_publicacao = intval($_POST['ano_publicacao']);
    $id_autor = intval($_POST['id_autor']);
    $anoAtual = date('Y');
    if ($titulo && $ano_publicacao > 1500 && $ano_publicacao <= $anoAtual && $id_autor) {
        $stmt = $conn->prepare("INSERT INTO livros (titulo, genero, ano_publicacao, id_autor) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssii', $titulo, $genero, $ano_publicacao, $id_autor);
        $stmt->execute();
        header('Location: list.php');
        exit;
    } else {
        $erro = 'Preencha todos os campos corretamente. Ano deve ser > 1500 e <= ano atual.';
    }
}
?>
<h2>Novo Livro</h2>
<?php if ($erro): ?><p style="color:red;"> <?= $erro ?> </p><?php endif; ?>
<form method="post">
    Título: <input name="titulo" required><br>
    Gênero: <input name="genero"><br>
    Ano de Publicação: <input name="ano_publicacao" type="number" min="1501" max="<?= date('Y') ?>" required><br>
    Autor: <select name="id_autor" required>
        <option value="">Selecione</option>
        <?php while($a = $autores->fetch_assoc()): ?>
            <option value="<?= $a['id_autor'] ?>"><?= htmlspecialchars($a['nome']) ?></option>
        <?php endwhile; ?>
    </select><br>
    <button type="submit">Salvar</button>
    <a href="list.php">Cancelar</a>
</form>
