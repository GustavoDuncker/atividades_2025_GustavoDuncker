<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="post">
    Número 1: <input type="number" name="num1"><br><br>
    Número 2: <input type="number" name="num2"><br><br>
    Número 3: <input type="number" name="num3"><br><br>
    <input type="submit" value="Verificar Maior">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $num3 = $_POST["num3"];

    $maior = $num1;

    if ($num2 > $maior) {
        $maior = $num2;
    }

    if ($num3 > $maior) {
        $maior = $num3;
    }

    echo "O maior número é: $maior";
}
?>

</body>
</html>