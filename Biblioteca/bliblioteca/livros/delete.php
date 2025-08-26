<?php
require_once '../config/db.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $conn->prepare("DELETE FROM emprestimos WHERE id_livro=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt = $conn->prepare("DELETE FROM livros WHERE id_livro=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
}
header('Location: list.php');
exit;
