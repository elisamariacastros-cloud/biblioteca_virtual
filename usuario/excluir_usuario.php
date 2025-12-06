<?php
    include '../conexao.php';

    $id = $_GET['id'];

    //sql para excluir registro no banco
    $sql = "DELETE FROM usuario WHERE id=".$id;

    if (mysqli_query($conexao, $sql)) {
        $msg = "Usuario excluído com sucesso!";
    } else {
        $msg = "Erro: " . $sql . "<br>" . mysqli_error($conexao);
    }

    mysqli_close($conexao);
    header('Location: http://localhost/crud/lista_usuario.php?msg='.$msg);
?>
