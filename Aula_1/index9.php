<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    
    , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <h1>Exibir a Soma de Todos os Números Entre Dois Valores</h1>

    <!-- Formulário -->
    <form method="POST">
        <input type="number" name="numero1" required placeholder="Primeiro número">
        <input type="number" name="numero2" required placeholder="Segundo número">
        <button type="submit">Calcular Soma</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numero1 = $_POST['numero1'];
        $numero2 = $_POST['numero2'];

        if ($numero1 > $numero2) {
            $temp = $numero1;
            $numero1 = $numero2;
            $numero2 = $temp;
        }

        $soma = 0;
        for ($i = $numero1 + 1; $i < $numero2; $i++) {
            $soma += $i;
        }

        echo "A soma de todos os números entre $numero1 e $numero2 é: $soma";
    }
    ?>

</body>
</html>