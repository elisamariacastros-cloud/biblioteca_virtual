<?php
include '../conexao.php';
$pdo = new PDO('mysql:host=localhost;port=3307;dbname=biblioteca', 'root', 'L0i4v0y7a08@');

// Totais
$total_livros = $pdo->query("SELECT COUNT(id) FROM livro")->fetchColumn();
$total_leitores = $pdo->query("SELECT COUNT(id) FROM usuario WHERE perfil='U'")->fetchColumn();
$total_downloads = $pdo->query("SELECT COUNT(id) FROM download")->fetchColumn();

// Top 5 livros mais baixados
$sql_top5 = "SELECT l.titulo, COUNT(d.id) AS total 
             FROM livro l 
             JOIN download d ON l.id=d.livro_id 
             GROUP BY l.titulo 
             ORDER BY total DESC LIMIT 5";
$top5_livros = $pdo->query($sql_top5)->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="p-4" style="background-color:#ffe6f2;">

<div class="container">
<h2 class="mb-4 text-center" style="color:#cc3d85;">Dashboard Biblioteca Virtual</h2>

<div class="row text-center mb-4">
    <div class="col-md-4 mb-3">
        <div class="card p-3 shadow-sm" style="border-radius:12px;">
            <h4><?= $total_livros ?></h4>
            <p>Livros no Acervo</p>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card p-3 shadow-sm" style="border-radius:12px;">
            <h4><?= $total_leitores ?></h4>
            <p>Usuários Leitores</p>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card p-3 shadow-sm" style="border-radius:12px;">
            <h4><?= $total_downloads ?></h4>
            <p>Downloads Realizados</p>
        </div>
    </div>
</div>

<h4>Top 5 Livros Mais Baixados</h4>
<ul class="list-group mb-4">
<?php foreach($top5_livros as $livro): ?>
    <li class="list-group-item"><?= $livro['titulo'] ?> (<?= $livro['total'] ?> downloads)</li>
<?php endforeach; ?>
</ul>

<a href="../adm/index.php" class="btn btn-primary">Voltar ao Painel</a>
</div>
</body>
</html>
