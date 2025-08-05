<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<h2>Contador de Vogais</h2>

<form method="post">
    <label>Digite um texto:</label><br>
    <input type="text" name="texto" required><br><br>
    <input type="submit" value="Contar Vogais">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $texto = $_POST["texto"];
    $vogais = 0;

    // Conta as vogais
    for ($i = 0; $i < strlen($texto); $i++) {
        $letra = strtolower($texto[$i]);
        if ($letra == 'a' || $letra == 'e' || $letra == 'i' || $letra == 'o' || $letra == 'u') {
            $vogais++;
        }
    }

    echo "<p>Quantidade de vogais: <strong>$vogais</strong></p>";
}
?>

</body>
</html>