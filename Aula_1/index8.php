<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
 <h1>Contar Números Pares</h1>

 <form method="POST">
        <input type="number" name="numero" required>
        <button type="submit">Contar Pares</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numero = $_POST['numero'];
        $contador = 0;

        for ($i = 1; $i <= $numero; $i++) {
            if ($i % 2 == 0) {
                $contador++;
            }
        }

        echo "Existem $contador números pares entre 1 e $numero.";
    }
    ?>

</body>
</html>