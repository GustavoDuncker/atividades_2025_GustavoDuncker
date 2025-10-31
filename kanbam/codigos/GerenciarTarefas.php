<?php
include("db.php");
$mensagem = "";

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM Tarefa WHERE idTarefa = $id");
    header('Location: GerenciarTarefas.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $status = $_POST['status'];
    $prioridade = $_POST['prioridade'];
    $stmt = $conn->prepare("UPDATE Tarefa SET Status=?, Prioridade=? WHERE idTarefa=?");
    $stmt->bind_param('ssi', $status, $prioridade, $id);
    $stmt->execute();
    $stmt->close();
    $mensagem = "<div class='alert success'>Tarefa atualizada!</div>";
}
$tarefas = $conn->query("SELECT t.*, u.NomeUsuario FROM Tarefa t JOIN Usuario u ON t.Usuario_idUsuario = u.idUsuario");
$kanban = [
    'a fazer' => [],
    'fazendo' => [],
    'pronto' => []
];
while ($t = $tarefas->fetch_assoc()) {
    $kanban[$t['Status']][] = $t;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Tarefas</title>
    <link rel="stylesheet" href="../codigos/styleVizualizar.css">
</head>
<body>
<div class="container">
    <h1>Gerenciamento de Tarefas</h1>
    <?php echo $mensagem; ?>
    <div class="kanban">
        <?php foreach (["a fazer", "fazendo", "pronto"] as $status): ?>
        <div class="kanban-col">
            <h2><?php echo ucfirst($status); ?></h2>
            <?php foreach ($kanban[$status] as $tarefa): ?>
                <div class="tarefa">
                    <strong><?php echo htmlspecialchars($tarefa['Descricao']); ?></strong><br>
                    Setor: <?php echo htmlspecialchars($tarefa['Setor']); ?><br>
                    Prioridade: <?php echo htmlspecialchars($tarefa['Prioridade']); ?><br>
                    Usuário: <?php echo htmlspecialchars($tarefa['NomeUsuario']); ?><br>
                    <form method="POST" style="margin-top:5px;">
                        <input type="hidden" name="id" value="<?php echo $tarefa['idTarefa']; ?>">
                        <select name="status">
                            <option value="a fazer" <?php if($tarefa['Status']==='a fazer') echo 'selected'; ?>>A Fazer</option>
                            <option value="fazendo" <?php if($tarefa['Status']==='fazendo') echo 'selected'; ?>>Fazendo</option>
                            <option value="pronto" <?php if($tarefa['Status']==='pronto') echo 'selected'; ?>>Pronto</option>
                        </select>
                        <select name="prioridade">
                            <option value="baixa" <?php if($tarefa['Prioridade']==='baixa') echo 'selected'; ?>>Baixa</option>
                            <option value="media" <?php if($tarefa['Prioridade']==='media') echo 'selected'; ?>>Média</option>
                            <option value="alta" <?php if($tarefa['Prioridade']==='alta') echo 'selected'; ?>>Alta</option>
                        </select>
                        <button type="submit" name="update">Atualizar</button>
                        <a href="GerenciarTarefas.php?delete=<?php echo $tarefa['idTarefa']; ?>" onclick="return confirm('Excluir esta tarefa?')">Excluir</a>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="link">
        <a href="../index.php">Voltar ao menu principal</a>
    </div>
</div>
</body>
</html>
