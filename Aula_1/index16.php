<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="post">
    Nome: <input type="text" name="nome"><br><br>
    Idade: <input type="number" name="idade"><br><br>
    <input type="submit" value="Verificar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];

    echo "Olá, $nome!<br>";

    if ($idade >= 16) {
        echo "Você pode votar.";
    } else {
        echo "Você não pode votar.";
    }
}
?>

</body>
</html>