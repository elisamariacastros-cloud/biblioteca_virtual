<?php
include '../conexao.php';

$sql = "SELECT categoria.*, livro.titulo 
        FROM categoria 
        JOIN livro ON categoria.livro_id = livro.id
        ORDER BY nome ASC";

$result = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Categorias — Biblioteca Virtual</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body { background:#ffe6f2; }
    .titulo { text-align:center; margin:25px; font-size:28px; font-weight:700; color:#d63384; }
    .btn-pink { background:#d63384;color:white; }
    .btn-pink:hover { background:#b0266a; }
</style>
</head>

<body>

<h1 class="titulo">📚 Categorias</h1>

<div class="container">

    <a href="cria_categoria.php" class="btn btn-pink mb-3">Adicionar Categoria</a>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Livro</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
        <?php while($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['titulo'] ?></td>
                <td><?= $row['nome'] ?></td>
                <td>
                    <a href="edita_categoria.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="excluir_categoria.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir esta categoria?')">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
