<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
 <h1>Verificar se um Número é Perfeito</h1>

    <form method="POST">
        <input type="number" name="numero" required>
        <button type="submit">Verificar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numero = $_POST['numero'];
        $soma_divisores = 0;

        for ($i = 1; $i < $numero; $i++) {
            if ($numero % $i == 0) {
                $soma_divisores += $i;
            }
        }

        if ($soma_divisores == $numero) {
            echo "$numero é um número perfeito.";
        } else {
            echo "$numero não é um número perfeito.";
        }
    }
    ?>

</body>
</html>