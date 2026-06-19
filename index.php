<?php
include("includes/conexao.php");

$sql = "SELECT * FROM produtos";
$resultado = mysqli_query($conexao, $sql);
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
    <header>
        <div>
            <h1> 📦 Gerenciamento de Produtos</h1>
        </div>
    </header>
    <!-- <h1>Gerenciamento de Produtos</h1> -->

    <div class="acoes">
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
                        <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                        <td>

                            <div class="btnEdit">
                                <section class="Edit">
                                    <a href="pages/editar.php?id=<?= $produto['id'] ?>">Editar</a>
                                </section>
                            </div>

                            <div class="btnExc">
                                <section class="Excluir">
                                    <a href="pages/excluir.php?id=<?= $produto['id'] ?>" onclick="return confirm('Deseja excluir?')">Excluir</a>
                                </section>
                            </div>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>
</body>

</html>