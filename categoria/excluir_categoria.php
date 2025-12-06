<?php
include '../conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM categoria WHERE id=$id";

mysqli_query($conexao, $sql);

header("Location: lista_categoria.php");
exit;
