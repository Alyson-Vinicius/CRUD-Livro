<?php
require 'php/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano_publicacao = $_POST['ano_publicacao'];
    $genero = $_POST['genero'];

    $sql = 'INSERT INTO livros (titulo, autor, ano_publicacao, genero) VALUES (?, ?, ?, ?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titulo, $autor, $ano_publicacao, $genero]);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Livro</title>
    <link rel="stylesheet" href="css/styles.css"> 
</head>
<body>

<div class="container">
    <h1>Adicionar Novo Livro</h1>
    <form action="create.php" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required>

        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor" required>

        <label for="ano_publicacao">Ano de Publicação:</label>
        <input type="number" name="ano_publicacao" id="ano_publicacao" required>

        <label for="genero">Gênero:</label>
        <input type="text" name="genero" id="genero" required>

        <button type="submit">Adicionar Livro</button>
    </form>
</div>

<script src="js/scripts.js"></script>
</body>
</html>
