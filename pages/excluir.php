<?php

include("../includes/conexao.php");

$id = (int) $_GET['id'];

$sql = "DELETE FROM produtos WHERE id = $id";

mysqli_query($conexao, $sql);

header("Location: ../index.php");
