<body>
    
    
    <?php
require 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM livros WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header('Location: index.php');
?>


<script src="js/scripts.js"></script>

</body>