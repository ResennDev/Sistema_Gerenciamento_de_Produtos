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

    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="ti ti-package"></i>
                Gerenciamento de Produtos
            </h1>
            <a href="pages/cadastrar.php" class="btn-new">
                <i class="ti ti-plus"></i>
                Novo Produto
            </a>
        </div>

        <div class="table-wrapper">
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
                                <span class="id-badge"><?= $produto['id'] ?></span>
                            </td>

                            <td>
                                <span class="prod-name"><?= $produto['nome'] ?></span>
                            </td>

                            <td>
                                <span class="desc"><?= $produto['descricao'] ?></span>
                            </td>

                            <td>
                                <span class="price">
                                    R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                                </span>
                            </td>

                            <td>
                                <div class="actions">

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
            <div class="table-footer">
                <span class="footer-info"><?= $totalProdutos ?> produtos cadastrados.</span>
            </div>
        </div>
    </div>








    <!-- <header>
        <div>
            <h1> 📦 Gerenciamento de Produtos</h1>
        </div>
    </header>
    <!-- <h1>Gerenciamento de Produtos</h1>

    <div class="novo">
        <a href="pages/cadastrar.php" class="btn-New">Novo Produto</a>
    </div>

    <div class="container-table">
        <div class="tabela">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>

                <?php while ($produto = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?= $produto['id'] ?></td>
                        <td><?= $produto['nome'] ?></td>
                        <td><?= $produto['descricao'] ?></td>
                        <td class="preco">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                        <td>

                            <div class="btnEdit">
                                <section class="Edit">
                                    <a href="pages/editar.php?id=<?= $produto['id'] ?>">📝 Editar</a>
                                </section>
                            </div>

                            <div class="btnExc">
                                <section class="Excluir">
                                    <a href="pages/excluir.php?id=<?= $produto['id'] ?>" onclick="return confirm('Deseja excluir?')">🗑️ Excluir</a>
                                </section>
                            </div>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div> -->
</body>

</html>