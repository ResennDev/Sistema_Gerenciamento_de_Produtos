<?php
include("<includes/conexao.php");

$sql = "SELECT * FROM produtos";
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Gerenciamento de Produtos</h1>

    <a href="pages/cadastrar.php" class="btn">Novo Produto</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>

        <?php while($produto = mysqli_fetch_assoc($resultado)){ ?>
        <tr>
            <td><?= $produto['id'] ?></td>
            <td><?= $produto['nome'] ?></td>
            <td><?= $produto['descricao'] ?></td>
            <td>R$ <?= number_format($produto['preco'],2,',','.') ?></td>
            <td>
                <a href="pages/editar.php?id=<?= $produto['id'] ?>">Editar</a>

                <a href="pages/excluir.php?id=<?= $produto['id'] ?>" onclick="return confirm('Deseja excluir?')">Excluir</a>
            </td>
        </tr>
        <?php } ?>

    </table>
</body>
</html>