<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form method="post">
    Número: <input type="number" name="numero"><br><br>
    <input type="submit" value="Calcular Tabuada">
</form>

<h1>Tabuada</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];

    echo "<h3>Tabuada do $numero</h3>";

    for ($i = 1; $i <= 10; $i++) {
        $resultado = $numero * $i;
        echo "$numero x $i = $resultado<br>";
    }
}
?>

</body>
</html>