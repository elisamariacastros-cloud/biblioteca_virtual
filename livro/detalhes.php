<?php
session_start();
include "../conexao.php";

// Pega ID vindo da URL
$id = $_GET["id"] ?? 0;

// Consulta no banco
$sql = "SELECT * FROM livro WHERE id = $id";
$result = mysqli_query($conexao, $sql);

// Se não encontrou nenhum livro
if (mysqli_num_rows($result) == 0) {
    echo "<h3>Livro não encontrado!</h3>";
    exit;
}

$livro = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title><?= $livro['titulo'] ?></title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background:#ffe6f2; }
.container { margin-top:40px; }

.card-livro {
    padding:25px;
    border-radius:15px;
    background:white;
    box-shadow:0 4px 15px rgba(255,20,147,0.25);
}

.capa {
    width:320px;
    height:450px;
    object-fit:cover;
    border-radius:10px;
    margin:auto;
    display:block;
}

.btn-pink {
    background:#d63384;
    color:white;
    font-weight:bold;
    border-radius:10px;
}
.btn-pink:hover { background:#b0266a; color:white; }

h1 { color:#d63384; font-weight:bold; }
</style>
</head>

<body>

<div class="container">
<div class="card-livro">

    <h1 class="text-center"><?= $livro['titulo'] ?></h1>

    <img src="<?= $livro['capa'] ?>" class="capa mt-3 mb-4">

    <p><strong>Autor:</strong> <?= $livro['autor'] ?></p>
    <p><strong>Editora:</strong> <?= $livro['editora'] ?></p>
    <p><strong>Ano de Publicação:</strong> <?= $livro['anoPublicacao'] ?></p>
    <p><strong>Nº de Páginas:</strong> <?= $livro['numeroPagina'] ?></p>
    <p><strong>Indicação de Idade:</strong> <?= $livro['indicacaoIdade'] ?></p>

    <hr>

    <p><strong>Descrição:</strong><br><?= nl2br($livro['descricao']) ?></p>
    
    <p><strong>Sinopse:</strong><br><?= nl2br($livro['sinopse']) ?></p>

    <!-- Botão estilizado -->
    <a href="#" onclick="alert('Download simulado 😊');" class="btn btn-pink w-100 mt-3">
        Baixar PDF
    </a>

    <a href="livros.php" class="btn btn-secondary w-100 mt-3">⬅ Voltar</a>

</div>
</div>

</body>
</html>
