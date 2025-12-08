<?php
include "../conexao.php";

// Segurança: só aceita requisição POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Requisição inválida.");
}

// ID do livro
$id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

if ($id == 0) {
    die("ID inválido.");
}

// Tratamento e limpeza dos campos
$titulo   = mysqli_real_escape_string($conexao, $_POST['titulo']);
$autor    = mysqli_real_escape_string($conexao, $_POST['autor']);
$editora  = mysqli_real_escape_string($conexao, $_POST['editora']);
$ano      = isset($_POST['anoPublicacao']) ? (int) $_POST['anoPublicacao'] : 0;
$paginas  = isset($_POST['numeroPagina']) ? (int) $_POST['numeroPagina'] : 0;
$idade    = isset($_POST['indicacaoIdade']) ? (int) $_POST['indicacaoIdade'] : 0;
$descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
$sinopse   = mysqli_real_escape_string($conexao, $_POST['sinopse']);

// Campo capa — pode ser vazio
$capa = isset($_POST['capa']) ? mysqli_real_escape_string($conexao, $_POST['capa']) : "";
$capa = trim($capa);

// Se capa estiver vazia, salva NULL
if ($capa === "") {
    $capa_sql = "NULL";
} else {
    $capa_sql = "'" . $capa . "'";
}

// SQL corrigido e seguro
$sql = "
    UPDATE livro SET
        titulo          = '$titulo',
        autor           = '$autor',
        editora         = '$editora',
        anoPublicacao   = $ano,
        numeroPagina    = $paginas,
        indicacaoIdade  = $idade,
        descricao       = '$descricao',
        sinopse         = '$sinopse',
        capa            = $capa_sql
    WHERE id = $id
";

// Executa
if (mysqli_query($conexao, $sql)) {

    // Redirecionamento CORRETO
    header("Location: lista_livro.php");
    exit;

} else {
    echo "<h3>Erro ao atualizar:</h3>";
    echo mysqli_error($conexao);
    echo "<br><br><strong>SQL Executado:</strong><br>$sql";
}
?>
