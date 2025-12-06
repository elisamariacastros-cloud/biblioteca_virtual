<?php
include '../conexao.php';

$titulo = $_POST['titulo'];
$autor  = $_POST['autor'];
$editora = $_POST['editora'];
$numeroPagina = $_POST['numeroPagina'];
$anoPublicacao = $_POST['anoPublicacao'];
$indicacaoIdade = $_POST['indicacaoIdade'];
$descricao = $_POST['descricao'];
$sinopse = $_POST['sinopse'];

$sql = "INSERT INTO livro (titulo, autor, editora, numeroPagina, anoPublicacao, indicacaoIdade, descricao, sinopse)
        VALUES ('$titulo', '$autor', '$editora', $numeroPagina, $anoPublicacao, $indicacaoIdade, '$descricao', '$sinopse')";

mysqli_query($conexao, $sql);

header("Location: lista_livro.php");
exit;
