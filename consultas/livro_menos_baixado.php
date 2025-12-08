<?php
include '../conexao.php';

$sql = "SELECT livro.titulo, COUNT(download.id) AS total_downloads
        FROM livro
        LEFT JOIN download ON livro.id = download.livro_id
        GROUP BY livro.titulo
        ORDER BY total_downloads ASC
        LIMIT 10";
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Livros Menos Baixados</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="p-4" style="background-color:#ffe6f2;">
<div class="container">
<h2 class="mb-4 text-center" style="color:#cc3d85;">Livros Menos Baixados</h2>

<table class="table table-hover align-middle">
<thead>
<tr><th>Título</th><th>Total Downloads</th></tr>
</thead>
<tbody>
<?php while($linha = mysqli_fetch_assoc($resultado)): ?>
<tr>
<td><?= $linha['titulo'] ?></td>
<td><?= $linha['total_downloads'] ?></td>
</tr>
<?php endwhile; ?>
</tbody>
</table>

<a href="../adm/index.php" class="btn btn-primary">Voltar ao Painel</a>
</div>
</body>
</html>
