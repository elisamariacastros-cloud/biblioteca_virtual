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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

<style>
    body { background:#ffe6f2; }
    .titulo { text-align:center; margin:25px; font-size:28px; font-weight:700; color:#d63384; }
    .btn-pink { background:#d63384;color:white; }
    .btn-pink:hover { background:#b0266a; }

    /* Botão Editar igual ao de Livros */
    .btn-edit {
        background:#ffd6e8;
        border:none;
        color:#d63384;
        padding:6px 12px;
        border-radius:8px;
        transition:.2s;
    }
    .btn-edit:hover { background:#ffb3d9; }

    /* Botão Excluir igual ao de Livros */
    .btn-delete {
        background:#ff9c9c;
        border:none;
        color:white;
        padding:6px 12px;
        border-radius:8px;
        transition:.2s;
    }
    .btn-delete:hover { background:#ff7b7b; }
</style>
</head>

<body>

<h1 class="titulo">📚 Categorias</h1>

<div class="container">

    <a href="cria_categoria.php" class="btn btn-pink mb-3">
        <i class="fa fa-plus"></i> Adicionar Categoria
    </a>

    <table class="table table-striped table-hover align-middle">
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

                    <!-- Ícone Editar -->
                    <a href="edita_categoria.php?id=<?= $row['id'] ?>" class="btn-edit">
                        <i class="fa-solid fa-pen"></i>
                    </a>

                    <!-- Ícone Excluir -->
                    <a href="excluir_categoria.php?id=<?= $row['id'] ?>" 
                       class="btn-delete"
                       onclick="return confirm('Deseja excluir esta categoria?')">
                        <i class="fa-solid fa-trash"></i>
                    </a>

                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
