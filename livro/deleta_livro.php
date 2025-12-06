<?php
include '../conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM livro WHERE id=$id";
mysqli_query($conexao, $sql);

header("Location: lista_livro.php");
exit;
