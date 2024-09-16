<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano_publicacao = $_POST['ano_publicacao'];
    $genero = $_POST['genero'];

    $sql = "INSERT INTO livros (titulo, autor, ano_publicacao, genero) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titulo, $autor, $ano_publicacao, $genero]);

    header('Location: index.php');
}
?>

<form method="POST" action="create.php">
    <input type="text" name="titulo" placeholder="Título do Livro" required>
    <input type="text" name="autor" placeholder="Autor" required>
    <input type="number" name="ano_publicacao" placeholder="Ano de Publicação" required>
    <input type="text" name="genero" placeholder="Gênero">
    <button type="submit">Adicionar Livro</button>
</form>
