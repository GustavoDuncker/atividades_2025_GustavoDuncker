<?php
require_once '../config/db.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $conn->prepare("SELECT id_livro FROM livros WHERE id_autor=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($livro = $result->fetch_assoc()) {
        $stmt2 = $conn->prepare("DELETE FROM emprestimos WHERE id_livro=?");
        $stmt2->bind_param('i', $livro['id_livro']);
        $stmt2->execute();
        $stmt3 = $conn->prepare("DELETE FROM livros WHERE id_livro=?");
        $stmt3->bind_param('i', $livro['id_livro']);
        $stmt3->execute();
    }
    $stmt = $conn->prepare("DELETE FROM autores WHERE id_autor=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
}
header('Location: list.php');
exit;
