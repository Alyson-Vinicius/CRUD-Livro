<?php
require 'php/db.php';


$sql = 'SELECT * FROM livros';
$stmt = $pdo->query($sql);
$livros = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Livros</title>
    <link rel="stylesheet" href="css/styles.css"> 
</head>
<body>

<div class="container">
    <h1>Gerenciamento de Livros</h1>
    <a href="create.php">Adicionar Novo Livro</a>
    <input type="text" id="search" placeholder="Buscar por título" onkeyup="filtrarLivros()">
    
    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Ano de Publicação</th>
            <th>Gênero</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($livros as $livro): ?>
            <tr>
                <td><?= $livro['id'] ?></td>
                <td><?= $livro['titulo'] ?></td>
                <td><?= $livro['autor'] ?></td>
                <td><?= $livro['ano_publicacao'] ?></td>
                <td><?= $livro['genero'] ?></td>
                <td>
                    <a href="update.php?id=<?= $livro['id'] ?>">Editar</a>
                   
                    <a href="delete.php?id=<?= $livro['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este livro?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<script src="js/scripts.js"></script>
</body>
</html>
