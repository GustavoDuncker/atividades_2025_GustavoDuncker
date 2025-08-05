<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h2>Login</h2>

<form method="post">
    Usuário: <input type="text" name="usuario"><br><br>
    Senha: <input type="password" name="senha"><br><br>
    <input type="submit" value="Entrar">
</form>

<?php

$usuarioCorreto = "admin";
$senhaCorreta = "1234";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if ($usuario == $usuarioCorreto && $senha == $senhaCorreta) {
        echo "<p>Login bem-sucedido! Bem-vindo, $usuario.</p>";
    } else {
        echo "<p>Usuário ou senha incorretos.</p>";
    }
}
?>

</body>
</html>