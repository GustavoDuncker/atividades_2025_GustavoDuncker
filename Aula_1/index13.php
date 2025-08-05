<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<h2>Conversor de Celsius para Fahrenheit</h2>

<form method="post">
    <label>Digite a temperatura em Celsius:</label><br>
    <input type="number" name="celsius" required step="any"><br><br>
    <input type="submit" value="Converter">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $celsius = $_POST["celsius"];
    $fahrenheit = ($celsius * 9/5) + 32;

    echo "<p>$celsius °C = <strong>$fahrenheit °F</strong></p>";
}
?>

</body>
</html>