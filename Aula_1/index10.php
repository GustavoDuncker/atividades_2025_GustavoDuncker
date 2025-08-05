<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
 <h1>Exibir a Sequência de Fibonacci até um Número</h1>

    <form method="POST">
        <input type="number" name="numero" required placeholder="Digite um número">
        <button type="submit">Mostrar Fibonacci</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numero = $_POST['numero'];

        $a = 0;
        $b = 1;

        echo "<h2>Sequência de Fibonacci até $numero:</h2>";
        echo "<p>$a</p>"; 

        while ($b <= $numero) {
            echo "<p>$b</p>";
            $temp = $a + $b;
            $a = $b;
            $b = $temp;
        }
    }
    ?>

</body>
</html>