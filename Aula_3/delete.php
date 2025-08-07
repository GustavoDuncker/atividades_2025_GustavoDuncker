<?php

    include 'db.php';
    $id = $_GET['id'];

    $sql = " DELETE FROM usuario WHERE id+$id";

    if($conn -> query($sql) === true){
        echo "Novo registro excluido com sucesso!";

    }else{
        echo "Erro" . $sql . "<br>" . $conn->error;
    }
    $conn -> close();
    header("Location: read.php");
    exit();
?>
