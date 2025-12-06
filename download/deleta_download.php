<?php
include "../conexao.php";

$id = $_GET["id"];

mysqli_query($conexao, "DELETE FROM download WHERE id=$id");

header("Location: lista_download.php");
exit;
