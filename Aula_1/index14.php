<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h2>Verificador de Ano Bissexto</h2>

<form method="post">
    <label>Digite um ano:</label><br>
    <input type="number" name="ano" required><br><br>
    <input type="submit" value="Verificar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ano = $_POST["ano"];

    if (($ano % 4 == 0 && $ano % 100 != 0) || ($ano % 400 == 0)) {
        echo "<p>O ano <strong>$ano</strong> é bissexto.</p>";
    } else {
        echo "<p>O ano <strong>$ano</strong> não é bissexto.</p>";
    }
}
?>

</body>
</html>