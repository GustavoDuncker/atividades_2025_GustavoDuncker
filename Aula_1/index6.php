<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
<h1>Exibir Divisores de um Número</h1>

    <form method="POST">
        <input type="number" name="numero" required>
        <button type="submit">Ver Divisores</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numero = (int)$_POST['numero'];
        echo "<h2>Divisores de $numero:</h2><ul>";
        for ($i = 1; $i <= $numero; $i++) {
            if ($numero % $i == 0) {
                echo "<li>$i</li>";
            }
        }
        echo "</ul>";
    }
    ?>

</body>
</html>