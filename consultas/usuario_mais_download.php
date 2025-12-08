<?php
include '../conexao.php';

$sql = "SELECT usuario.nome, usuario.email, COUNT(download.id) AS total_downloads
        FROM usuario
        JOIN download ON usuario.id = download.usuario_id
        GROUP BY usuario.id
        ORDER BY total_downloads DESC
        LIMIT 10";
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Usuários com Mais Downloads</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="p-4" style="background-color:#ffe6f2;">
<div class="container">
<h2 class="mb-4 text-center" style="color:#cc3d85;">Usuários com Mais Downloads</h2>

<table class="table table-hover align-middle">
<thead>
<tr><th>Nome</th><th>Email</th><th>Total Downloads</th></tr>
</thead>
<tbody>
<?php while($linha = mysqli_fetch_assoc($resultado)): ?>
<tr>
<td><?= $linha['nome'] ?></td>
<td><?= $linha['email'] ?></td>
<td><?= $linha['total_downloads'] ?></td>
</tr>
<?php endwhile; ?>
</tbody>
</table>

<a href="../adm/index.php" class="btn btn-primary">Voltar ao Painel</a>
</div>
</body>
</html>
