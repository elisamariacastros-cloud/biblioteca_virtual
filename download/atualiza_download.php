<?php
include "../conexao.php";

$id = $_POST["id"];
$usuario_id = $_POST["usuario_id"];
$livro_id   = $_POST["livro_id"];

$sql = "UPDATE download SET 
        usuario_id = $usuario_id,
        livro_id   = $livro_id
        WHERE id = $id";

mysqli_query($conexao, $sql);

header("Location: lista_download.php");
exit;
