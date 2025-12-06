<?php
include '../conexao.php';

$livro_id = $_POST['livro_id'];
$nome = $_POST['nome'];

$sql = "INSERT INTO categoria (livro_id, nome)
        VALUES ('$livro_id', '$nome')";

mysqli_query($conexao, $sql);

header("Location: lista_categoria.php");
exit;
