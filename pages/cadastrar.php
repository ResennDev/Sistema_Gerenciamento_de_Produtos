<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="container">

        <div class="page-header">
            <h1 class="page-title">
                <i class="ti ti-plus"></i>
                Novo Produto
            </h1>

            <a href="../index.php" class="btn-new">
                <i class="ti ti-arrow-left"></i>
                Voltar
            </a>
        </div>

        <div class="table-wrapper" style="padding: 25px;">

            <form action="../actions/salvar.php" method="POST">

                <div class="form-group">
                    <label>Nome</label>
                    <input
                        type="text"
                        name="nome"
                        placeholder="Digite o nome do produto"
                        required>
                </div>

                <div class="form-group">
                    <label>Descrição</label>
                    <input
                        type="text"
                        name="descricao"
                        placeholder="Digite a descrição do produto">
                </div>

                <div class="form-group">
                    <label>Preço (R$)</label>
                    <input
                        type="text"
                        id="preco"
                        name="preco"
                        placeholder="R$ 0,00"
                        required>
                </div>

                <div style="display:flex; gap:10px; margin-top:20px;">
                    <button type="submit" class="btn-save">
                        <i class="ti ti-device-floppy"></i>
                        Salvar
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