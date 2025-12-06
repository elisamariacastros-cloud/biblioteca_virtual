<?php
include '../conexao.php';

$id = $_POST['id'];
$livro_id = $_POST['livro_id'];
$nome = $_POST['nome'];

$sql = "UPDATE categoria
        SET livro_id='$livro_id',
            nome='$nome'
        WHERE id=$id";

mysqli_query($conexao, $sql);

header("Location: lista_categoria.php");
exit;
