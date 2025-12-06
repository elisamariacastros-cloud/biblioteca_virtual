<?php 
include '../conexao.php';

$sql = "SELECT * FROM livro";
$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Lista de Livros</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background:#ffe6f2;
    font-family:Inter, sans-serif;
}

.titulo {
    text-align:center;
    margin:30px 0;
    font-weight:700;
    color:#d63384;
}

.table thead {
    background:#d63384;
    color:white;
}

.btn-pink {
    background:#d63384;
    color:white;
    border-radius:6px;
}
.btn-pink:hover {
    background:#b0266a;
    color:white;
}
</style>
</head>

<body>

<h1 class="titulo">📚 Lista de Livros</h1>

<div class="container">

<a href="cria_livro.php" class="btn btn-pink mb-3">+ Cadastrar Livro</a>

<table class="table table-bordered table-striped">
<thead>
<tr>
    <th>ID</th>
    <th>Título</th>
    <th>Autor</th>
    <th>Editora</th>
    <th>Ano</th>
    <th>Ações</th>
</tr>
</thead>

<tbody>
<?php while ($l = mysqli_fetch_assoc($resultado)) : ?>
<tr>
    <td><?= $l['id'] ?></td>
    <td><?= $l['titulo'] ?></td>
    <td><?= $l['autor'] ?></td>
    <td><?= $l['editora'] ?></td>
    <td><?= $l['anoPublicacao'] ?></td>
    <td>
        <a href="edita_livro.php?id=<?= $l['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
        <a href="deleta_livro.php?id=<?= $l['id'] ?>" class="btn btn-danger btn-sm"
           onclick="return confirm('Deseja excluir este livro?')">Excluir</a>
    </td>
</tr>
<?php endwhile; ?>
</tbody>

</table>

</div>
</body>
</html>
