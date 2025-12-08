<?php
include "../conexao.php";

$usuario_id = $_POST["usuario_id"];
$livro_id   = $_POST["livro_id"];

$sql = "INSERT INTO download (usuario_id, livro_id, dataHoraBaixou)
        VALUES ($usuario_id, $livro_id, NOW())";

mysqli_query($conexao, $sql);

header("Location: lista_download.php");
exit;
