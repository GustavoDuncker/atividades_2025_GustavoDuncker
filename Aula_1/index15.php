<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="post">
    Peso (kg): <input type="text" name="peso"><br><br>
    Altura (m): <input type="text" name="altura"><br><br>
    <input type="submit" value="Calcular IMC">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peso = $_POST["peso"];
    $altura = $_POST["altura"];

    if ($peso > 0 && $altura > 0) {
        $imc = $peso / ($altura * $altura);

        echo "Seu IMC é: " . round($imc, 2) . "<br>";

        if ($imc < 18.5) {
            echo "Categoria: Abaixo do peso";
        } elseif ($imc < 25) {
            echo "Categoria: Peso normal";
        } elseif ($imc < 30) {
            echo "Categoria: Sobrepeso";
        } else {
            echo "Categoria: Obesidade";
        }
    } else {
        echo "Preencha os valores corretamente.";
    }
}
?>

</body>
</html>