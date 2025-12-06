<?php
include '../conexao.php';

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor  = $_POST['autor'];
$editora = $_POST['editora'];
$numeroPagina = $_POST['numeroPagina'];
$anoPublicacao = $_POST['anoPublicacao'];
$indicacaoIdade = $_POST['indicacaoIdade'];
$descricao = $_POST['descricao'];
$sinopse = $_POST['sinopse'];

$sql = "UPDATE livro SET 
        titulo='$titulo',
        autor='$autor',
        editora='$editora',
        numeroPagina=$numeroPagina,
        anoPublicacao=$anoPublicacao,
        indicacaoIdade=$indicacaoIdade,
        descricao='$descricao',
        sinopse='$sinopse'
        WHERE id=$id";

mysqli_query($conexao, $sql);

header("Location: lista_livro.php");
exit;
