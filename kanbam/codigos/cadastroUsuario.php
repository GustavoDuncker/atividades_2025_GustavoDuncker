<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="../codigos/styleUsuarios.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro de Usuário</h1>
        <?php
        $mensagem = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once '../db/db.php';
            $nome = trim($_POST['nome'] ?? '');
            $email = trim($_POST['email'] ?? '');
            if ($nome && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $stmt = $conn->prepare("INSERT INTO usuarios (nome, email) VALUES (?, ?)");
                $stmt->bind_param('ss', $nome, $email);
                if ($stmt->execute()) {
                    $mensagem = '<div class="alert success">Cadastro concluído com sucesso</div>';
                } else {
                    $mensagem = '<div class="alert error">Erro ao cadastrar usuário</div>';
                }
                $stmt->close();
            } else {
                $mensagem = '<div class="alert error">Preencha todos os campos corretamente</div>';
            }
            $conn->close();
        }
        echo $mensagem;
        ?>
        <form action="" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Cadastrar</button>
        </form>
        <div class="link">
            <a href="../index.php">Voltar ao menu principal</a>
        </div>
    </div>
</body>
</html>
