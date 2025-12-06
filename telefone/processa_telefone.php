<?php
include '../conexao.php';

$usuario_id = $_POST['usuario_id'];
$DDD = $_POST['DDD'];
$telefone = $_POST['telefone'];

$sql = "INSERT INTO telefone (usuario_id, DDD, telefone)
        VALUES ('$usuario_id', '$DDD', '$telefone')";

mysqli_query($conexao, $sql);

header("Location: lista_telefone.php");
exit;
