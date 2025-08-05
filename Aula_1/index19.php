<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="post">
    Senha: <input type="password" name="senha"><br><br>
    <input type="submit" value="Verificar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha = $_POST["senha"];

    if (strlen($senha) >= 8 && preg_match("/[a-zA-Z]/", $senha) && preg_match("/[0-9]/", $senha)) {
        echo "Senha forte.";
    } else {
        echo "Senha fraca. Use pelo menos 8 caracteres com letras e números.";
    }
}
?>

</body>
</html>