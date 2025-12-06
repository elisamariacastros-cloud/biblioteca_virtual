<?php
include '../conexao.php';

$id = $_GET['id'] ?? 0; // evita erro caso o id não venha

// sql para excluir registro no banco
$sql = "DELETE FROM usuario WHERE id = $id";

if (mysqli_query($conexao, $sql)) {
    $msg = "Usuario excluído com sucesso!";
} else {
    $msg = "Erro: " . mysqli_error($conexao);
}

mysqli_close($conexao);

// redireciona para a lista correta
header('Location: lista_usuario.php?msg=' . $msg);
exit;
?>
