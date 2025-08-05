<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    

</head>

<form method="post">
    Número: <input type="number" name="numero" min="0"><br><br>
    <input type="submit" value="Calcular Fatorial">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];
    $fatorial = 1;

    for ($i = 1; $i <= $numero; $i++) {
        $fatorial *= $i;
    }

    echo "<p>Fatorial de $numero é: $fatorial</p>";
}
?>

</body>
</html>