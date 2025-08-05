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
    <input type="submit" value="Verificar">
</form>

<?php

function somaDivisores($n) {
    $soma = 0;
    for ($i = 1; $i < $n; $i++) {
        if ($n % $i == 0) {
            $soma += $i;
        }
    }
    return $soma;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];

    $soma1 = somaDivisores($num1);
    $soma2 = somaDivisores($num2);

    if ($soma1 == $num2 && $soma2 == $num1) {
        echo "<p>$num1 e $num2 são números amigos!</p>";
    } else {
        echo "<p>$num1 e $num2 não são números amigos.</p>";
    }
}
?>

</body>
</html>