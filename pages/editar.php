<?php

include("../includes/conexao.php");

$id = (int)$_GET['id'];

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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="container">

        <div class="page-header">
            <h1 class="page-title">
                <i class="ti ti-edit"></i>
                Editar Produto
            </h1>

            <a href="../index.php" class="btn-novo">
                <i class="ti ti-arrow-left"></i>
                Voltar
            </a>
        </div>

        <div class="card-form">

            <form action="../actions/atualizar.php" method="POST">

                <input type="hidden" name="id" value="<?= $produto['id'] ?>">

                <div class="form-group">
                    <label>Nome</label>
                    <input
                        type="text"
                        name="nome"
                        maxlength="50"
                        value="<?= $produto['nome'] ?>"
                        required>
                </div>

                <div class="form-group">
                    <label>Descrição</label>
                    <input
                        type="text"
                        name="descricao"
                        maxlength="150"
                        value="<?= $produto['descricao'] ?>"
                        required>
                </div>

                <div class="form-group">
                    <label>Preço</label>
                    <input
                        type="text"
                        id="preco"
                        name="preco"
                        value="<?= number_format($produto['preco'], 2, ',', '.') ?>"
                        required>
                </div>

                <div class="form-acoes">
                    <button type="submit" class="btn-save">
                        <i class="ti ti-device-floppy"></i>
                        Atualizar
                    </button>

                    <a href="../index.php" class="btn-cancel">
                        Cancelar
                    </a>
                </div>

            </form>

        </div>

    </div>

    <script>
        const preco = document.getElementById('preco');

        preco.addEventListener('input', function(e) {

            let valor = e.target.value.replace(/\D/g, '');

            valor = (parseInt(valor || 0) / 100).toFixed(2);

            valor = valor
                .replace('.', ',')
                .replace(/\B(?=(\d{3})+(?!\d))/g, '.');

            e.target.value = 'R$ ' + valor;
        });
    </script>
</body>

</html>