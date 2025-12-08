<?php
include '../conexao.php';

$sql = "SELECT categoria.nome AS categoria, COUNT(livro.id) AS total_livros
        FROM categoria
        LEFT JOIN livro ON livro_id = categoria.id
        GROUP BY categoria.nome
        ORDER BY total_livros DESC";
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Livros por Categoria</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="p-4" style="background-color:#ffe6f2;">
<div class="container">
<h2 class="mb-4 text-center" style="color:#cc3d85;">Livros por Categoria</h2>

<table class="table table-hover align-middle">
<thead>
<tr><th>Categoria</th><th>Total de Livros</th></tr>
</thead>
<tbody>
<?php while($linha = mysqli_fetch_assoc($resultado)): ?>
<tr>
<td><?= $linha['categoria'] ?></td>
<td><?= $linha['total_livros'] ?></td>
</tr>
<?php endwhile; ?>
</tbody>
</table>

<a href="../adm/index.php" class="btn btn-primary">Voltar ao Painel</a>
</div>
</body>
</html>
