<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
 <h1>Verificar se uma Palavra é um Palíndromo</h1>

    <!-- Formulário -->
    <form method="POST">
        <input type="text" name="palavra" required placeholder="Digite uma palavra">
        <button type="submit">Verificar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $palavra = $_POST['palavra'];
        
        $palavra = strtolower(str_replace(' ', '', $palavra));
        
        $palavra_invertida = strrev($palavra);

        if ($palavra == $palavra_invertida) {
            echo "<p>'$palavra' é um palíndromo!</p>";
        } else {
            echo "<p>'$palavra' não é um palíndromo.</p>";
        }
    }
    ?>

</body>
</html>