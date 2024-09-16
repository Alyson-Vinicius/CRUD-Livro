<body>
    
    
    <?php
require 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano_publicacao = $_POST['ano_publicacao'];
    $genero = $_POST['genero'];
    
    $sql = "UPDATE livros SET titulo = ?, autor = ?, ano_publicacao = ?, genero = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titulo, $autor, $ano_publicacao, $genero, $id]);
    
    header('Location: index.php');
} else {
    $sql = 'SELECT * FROM livros WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $livro = $stmt->fetch();
}
?>

<form method="POST" action="update.php?id=<?= $id ?>">
    <input type="text" name="titulo" value="<?= $livro['titulo'] ?>" required>
    <input type="text" name="autor" value="<?= $livro['autor'] ?>" required>
    <input type="number" name="ano_publicacao" value="<?= $livro['ano_publicacao'] ?>" required>
    <input type="text" name="genero" value="<?= $livro['genero'] ?>">
    <button type="submit">Atualizar Livro</button>
</form>



<script src="js/scripts.js"></script>

</body>