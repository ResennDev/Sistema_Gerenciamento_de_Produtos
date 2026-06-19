<?php

include("../includes/conexao.php");

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];

$sql = "INSERT INTO produtos(nome, descricao, preco)
VALUES ('$nome', '$descricao', '$preco')";

mysqli_query($conexao, $sql);

header("Location: ../index.php");
