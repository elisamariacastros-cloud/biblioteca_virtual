<?php
    include '../conexao.php';

    $nome = $_POST['nome'] ?? '';
    $idade = $_POST['idade'] ?? '';
    $perfil = $_POST['perfil'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $telefone = $_POST['telefone'] ?? '';

    //sql para inserir no banco
    $sql = "INSERT INTO usuario (nome, idade, perfil, email, senha, telefone)
            VALUES ('$nome', '$idade', '$perfil', '$email', '$senha', '$telefone')";

    if (mysqli_query($conexao, $sql)) {
        $msg = "Novo registro criado";
    } else {
        $msg = "Erro: " . $sql . "<br>" . mysqli_error($conexao);
    }

    mysqli_close($conexao);
    header('Location: http://localhost/crud/lista_aluno.php?msg='.$msg);
?>