<?php
require 'db.php';

$sql = 'SELECT * FROM livros';
$stmt = $pdo->query($sql);
$livros = $stmt->fetchAll();
?>

<a href="create.php">Adicionar Novo Livro</a>
<table border = "1">
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
