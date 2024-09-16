<?php
require 'php/db.php';

$id = $_GET['id'];

$sql = 'SELECT * FROM livros WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$livro = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano_publicacao = $_POST['ano_publicacao'];
    $genero = $_POST['genero'];

    $sql = 'UPDATE livros SET titulo = ?, autor = ?, ano_publicacao = ?, genero = ? WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titulo, $autor, $ano_publicacao, $genero, $id]);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro</title>
    <link rel="stylesheet" href="css/styles.css"> 
</head>
<body>

<div class="container">
    <h1>Editar Livro</h1>
    <form action="update.php?id=<?= $id ?>" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?= $livro['titulo'] ?>" required>

        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor" value="<?= $livro['autor'] ?>" required>

        <label for="ano_publicacao">Ano de Publicação:</label>
        <input type="number" name="ano_publicacao" id="ano_publicacao" value="<?= $livro['ano_publicacao'] ?>" required>

        <label for="genero">Gênero:</label>
        <input type="text" name="genero" id="genero" value="<?= $livro['genero'] ?>" required>

        <button type="submit">Salvar Alterações</button>
    </form>
</div>

<script src="js/scripts.js"></script>
</body>
</html>
