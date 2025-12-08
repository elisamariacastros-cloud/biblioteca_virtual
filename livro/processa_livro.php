<?php
include "../conexao.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: cria_livro.php");
    exit;
}

// pega e sanitiza
$titulo = mysqli_real_escape_string($conexao, $_POST['titulo'] ?? '');
$autor = mysqli_real_escape_string($conexao, $_POST['autor'] ?? '');
$editora = mysqli_real_escape_string($conexao, $_POST['editora'] ?? '');
$anoPublicacao = (int)($_POST['anoPublicacao'] ?? 0);
$numeroPagina = (int)($_POST['numeroPagina'] ?? 0);
$indicacaoIdade = (int)($_POST['indicacaoIdade'] ?? 0);
$descricao = mysqli_real_escape_string($conexao, $_POST['descricao'] ?? '');
$sinopse = mysqli_real_escape_string($conexao, $_POST['sinopse'] ?? '');
$capa = mysqli_real_escape_string($conexao, $_POST['capa'] ?? ''); // <- aqui

// Inserção (certifique-se que a tabela e colunas existem)
$sql = "INSERT INTO livro 
    (titulo, autor, editora, anoPublicacao, numeroPagina, indicacaoIdade, descricao, sinopse, capa)
    VALUES
    ('$titulo', '$autor', '$editora', $anoPublicacao, $numeroPagina, $indicacaoIdade, '$descricao', '$sinopse', '$capa')";

if (mysqli_query($conexao, $sql)) {
    // redireciona para a lista com mensagem (opcional)
    header("Location: lista_livro.php");
    exit;
} else {
    // debug simples
    echo "Erro ao inserir: " . mysqli_error($conexao);
}
?>
