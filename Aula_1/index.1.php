<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Verificar se um número é par ou ímpar</h1>

<form method="POST">
    Digite um número inteiro:
    <input type="number" name="number" />
    <input type="submit" value="Enviar" />
</form>

<?php
if (isset($_POST['number'])) {
    $resto = $_POST['number'] % 2;
    if ($resto == 0) {
        echo "O número ".$_POST['number']." é par.";
    } else {
        echo "O número ".$_POST['number']." é ímpar.";
    }
}

?>

</body>
</html>