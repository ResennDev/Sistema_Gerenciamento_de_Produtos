<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <h1>Novo Produto</h1>

    <form action="../actions/salvar.php" method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Descrição:</label>
        <textarea name="descricao"></textarea>

        <label>Preço:</label>
        <input type="number" step="0.01" name="preco" required>

        <button type="submit">Salvar</button>

    </form>

    <a href="../index.php">Voltar</a>

</body>

</html>