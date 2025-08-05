<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="post">
    Dia: <input type="number" name="dia"><br><br>
    Mês: <input type="number" name="mes"><br><br>
    Ano: <input type="number" name="ano"><br><br>
    <input type="submit" value="Validar Data">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dia = $_POST["dia"];
    $mes = $_POST["mes"];
    $ano = $_POST["ano"];

    if (checkdate($mes, $dia, $ano)) {
        echo "A data $dia/$mes/$ano é válida.";
    } else {
        echo "A data $dia/$mes/$ano é inválida.";
    }
}
?>

</body>
</html>