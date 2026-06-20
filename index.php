<?php
include("includes/conexao.php");

$sql = "SELECT * FROM produtos";
$resultado = mysqli_query($conexao, $sql);
$totalProdutos = mysqli_num_rows($resultado);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Produtos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container-wide">
        <div class="container">
            <div class="page-header">
                <h1 class="page-title">
                    <i class="ti ti-package"></i>
                    Gerenciamento de Produtos
                </h1>
                <a href="pages/cadastrar.php" class="btn-novo">
                    <i class="ti ti-plus"></i>
                    Novo Produto
                </a>
            </div>

            <div class="table-cabecalho">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($produto = mysqli_fetch_assoc($resultado)) { ?>
                            <tr>
                                <td>
                                    <span class="id"><?= $produto['id'] ?></span>
                                </td>

                                <td>
                                    <span class="nome"><?= $produto['nome'] ?></span>
                                </td>

                                <td>
                                    <span class="desc"><?= $produto['descricao'] ?></span>
                                </td>

                                <td>
                                    <span class="preco">
                                        R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                                    </span>
                                </td>

                                <td>
                                    <div class="acoes">

                                        <a class="btn-edit"
                                            href="pages/editar.php?id=<?= $produto['id'] ?>">
                                            <i class="ti ti-edit"></i>
                                            Editar
                                        </a>

                                        <a class="btn-del"
                                            href="pages/excluir.php?id=<?= $produto['id'] ?>"
                                            onclick="return confirm('Deseja excluir este produto?')">
                                            <i class="ti ti-trash"></i>
                                            Excluir
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="table-rod">
                    <span class="rod-info"><?= $totalProdutos ?> produtos cadastrados.</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>