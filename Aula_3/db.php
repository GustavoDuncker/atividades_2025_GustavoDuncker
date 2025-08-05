<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "crud_system_caio";

$conn = new mysqli($servername, $username, $password, $dbname);

if( $conn -> connect_error){
    die("Conexão Falhou " . $conn->connect_error);
}

?>

</body>
</html>