<?php

include("../includes/conexao.php");

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = str_replace('R$ ', '', $_POST['preco']);
$preco = str_replace('.', '', $preco);
$preco = str_replace(',', '.', $preco);

$sql = "INSERT INTO produtos(nome, descricao, preco)
VALUES ('$nome', '$descricao', '$preco')";

mysqli_query($conexao, $sql);

header("Location: ../index.php");
exit();
