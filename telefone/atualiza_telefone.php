<?php
include '../conexao.php';

$id = $_POST['id'];
$usuario_id = $_POST['usuario_id'];
$DDD = $_POST['DDD'];
$telefone = $_POST['telefone'];

$sql = "UPDATE telefone
        SET usuario_id='$usuario_id',
            DDD='$DDD',
            telefone='$telefone'
        WHERE id=$id";

mysqli_query($conexao, $sql);

header("Location: lista_telefone.php");
exit;
