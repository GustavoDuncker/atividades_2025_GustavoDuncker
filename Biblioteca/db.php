<?php
$conn = new mysqli("localhost", "root", "", "bibliotecaDuncker");

if ($conn->connect_error) {
    die("Erro na conexão");
}

?>