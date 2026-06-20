<?php

include("../includes/conexao.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$nome = ucwords(strtolower(trim($nome)));
$descricao = ucfirst(strtolower(trim($descricao)));
$preco = str_replace('R$ ', '', $_POST['preco']);
$preco = str_replace('.', '', $preco);
$preco = str_replace(',', '.', $preco);

$sql = "UPDATE produtos
    SET nome ='$nome',
        descricao='$descricao',
        preco='$preco'
    WHERE id=$id";

mysqli_query($conexao, $sql);

header("Location: ../index.php");
exit();
