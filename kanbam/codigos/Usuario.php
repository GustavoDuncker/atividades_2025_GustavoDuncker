<?php
include("db.php");
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);

    if ($nome == "") {
        $mensagem = "<div class='alert error'>O nome do usuário é obrigatório!</div>";
    } else {
        $stmt = $conn->prepare("INSERT INTO Usuario (NomeUsuario) VALUES (?)");
        $stmt->bind_param("s", $nome);

        if ($stmt->execute()) {
            $mensagem = "<div class='alert success'>Usuário cadastrado com sucesso!</div>";
        } else {
            $mensagem = "<div class='alert error'>Erro ao cadastrar o usuário!</div>";
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="styleUsuarios.css">
</head>
<body>
<div class="container">
    <h1>Cadastro de Usuário</h1>

    <?php echo $mensagem; ?>

    <form method="POST" action="">
        <label>Nome do Usuário:</label>
        <input type="text" name="nome" required>
        <button type="submit">Cadastrar</button>
    </form>

    <p style="text-align:center; margin-top:15px;">
        <a href="cadastro_tarefa.php">Ir para cadastro de tarefas</a>
    </p>
</div>
</body>
</html>