<?php
include("db.php");
$mensagem = "";


$usuarios = [];
$result = $conn->query("SELECT idUsuario, NomeUsuario FROM Usuario ORDER BY NomeUsuario ASC");
while ($row = $result->fetch_assoc()) {
    $usuarios[] = $row;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_POST["usuario"];
    $descricao = $_POST["descricao"];
    $setor = $_POST["setor"];
    $status = $_POST["status"];
    $prioridade = $_POST["prioridade"];

    if ($usuario_id == "" || $descricao == "" || $setor == "" || $status == "" || $prioridade == "") {
        $mensagem = "<div class='alert error'>Todos os campos são obrigatórios!</div>";
    } else {
        $stmt = $conn->prepare("INSERT INTO Tarefa (Usuario_idUsuario, Descricao, Setor, Status, Prioridade) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $usuario_id, $descricao, $setor, $status, $prioridade);

        if ($stmt->execute()) {
            $mensagem = "<div class='alert success'>Tarefa cadastrada com sucesso!</div>";
        } else {
            $mensagem = "<div class='alert error'>Erro ao cadastrar a tarefa!</div>";
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Tarefa</title>
    <link rel="stylesheet" href="../styles/styleUsuarios.css">
    <link rel="stylesheet" href="../styles/styleIndex.css">
    <link rel="stylesheet" href="../styles/styleTarefas.css">
    <link rel="stylesheet" href="../styles/styleVizualizar.css">
</head>
<body>
<div class="container">
    <h1>Cadastro de Tarefa</h1>

    <?php echo $mensagem; ?>

    <form method="POST" action="">
        <label>Usuário:</label>
        <select name="usuario" required>
            <option value="">-- Selecione um usuário --</option>
            <?php foreach ($usuarios as $u): ?>
                <option value="<?php echo $u['idUsuario']; ?>"><?php echo htmlspecialchars($u['NomeUsuario']); ?></option>
            <?php endforeach; ?>
        </select>

        <label>Descrição:</label>
        <input type="text" name="descricao" required>

        <label>Setor:</label>
        <input type="text" name="setor" required>

        <label>Status:</label>
        <select name="status" required>
            <option value="a fazer">A Fazer</option>
            <option value="fazendo">Fazendo</option>
            <option value="pronto">Pronto</option>
        </select>

        <label>Prioridade:</label>
        <select name="prioridade" required>
            <option value="baixa">Baixa</option>
            <option value="media">Média</option>
            <option value="alta">Alta</option>
        </select>

        <button type="submit">Cadastrar</button>
    </form>

    <p style="text-align:center; margin-top:15px;">
        <a href="../index.php">Voltar ao menu principal</a>
    </p>
</div>
</body>
</html>