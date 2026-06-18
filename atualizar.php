<?php 

include("conexao.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];

$sql = "UPDATE produtos
SET nome ='$nome',
descricao='$descricao',
preco='$preco'
WHERE id=$id";

mysqli_query($conexao, $sql);

header("Location: index.php");
?>