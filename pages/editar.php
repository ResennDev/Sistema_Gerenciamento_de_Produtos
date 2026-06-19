<?php

include("../includes/conexao.php");

$id = $_GET['id'];

$sql = "SELECT * FROM produtos WHERE id = $id";
$resultado = mysqli_query($conexao, $sql);

$produto = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Editar Produto</h1>

    <form action="../actions/atualizar.php" method="POST">

    <input type="hidden" name="id" value="<?= $produto['id'] ?>">

    <label>Nome:</label>
    <input type="text" name="nome" value="<?= $produto['nome'] ?>" required>

    <label>Descrição</label>
    <textarea name="descricao" required><?= $produto['descricao'] ?></textarea>

    <label>Preço:</label>
    <input type="number" step="0.01" name="preco" value="<?= $produto['preco'] ?>" required>

    <button type="submit">Atualizar</button>

    </form>

    <a href="../index.php">Voltar</a>

</body>
</html>