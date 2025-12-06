<?php
include "../conexao.php";

$sql = "SELECT download.id, 
               usuario.nome AS usuario,
               livro.titulo AS livro,
               download.dataDownload
        FROM download
        JOIN usuario ON usuario.id = download.usuario_id
        JOIN livro ON livro.id = download.livro_id
        ORDER BY download.id DESC";

$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Lista de Downloads</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { background:#ffe6f2; font-family:Inter, sans-serif; }
.titulo { text-align:center; margin:30px 0; font-weight:700; color:#d63384; }
.table thead { background:#d63384; color:white; }
.btn-pink { background:#d63384; color:white; }
.btn-pink:hover { background:#b0266a; color:white; }
</style>
</head>

<body>

<h1 class="titulo">📥 Downloads Realizados</h1>

<div class="container">
<a href="cria_download.php" class="btn btn-pink mb-3">+ Registrar Download</a>

<table class="table table-bordered table-striped">
<thead>
<tr>
    <th>ID</th>
    <th>Usuário</th>
    <th>Livro</th>
    <th>Data</th>
    <th>Ações</th>
</tr>
</thead>
<tbody>
<?php while($d = mysqli_fetch_assoc($resultado)): ?>
<tr>
    <td><?= $d['id'] ?></td>
    <td><?= $d['usuario'] ?></td>
    <td><?= $d['livro'] ?></td>
    <td><?= $d['dataDownload'] ?></td>
    <td>
        <a href="edita_download.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
        <a href="deleta_download.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-sm"
        onclick="return confirm('Deseja excluir este download?')">Excluir</a>
    </td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>

</body>
</html>
