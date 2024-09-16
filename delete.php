<?php
require 'php/db.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $sql = 'DELETE FROM livros WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

   
    header('Location: index.php');
    exit();
} else {
    echo "ID inválido ou não fornecido!";
}
?>
