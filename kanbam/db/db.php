<?php
$host = "localhost";
$user = "root";          
$pass = "root";    
$db   = "mydb";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro na conexão com o banco: " . $conn->connect_error);
}
?>
