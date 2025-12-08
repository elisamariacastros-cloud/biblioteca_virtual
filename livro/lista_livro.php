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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

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

/* ------------------- */
/* BOTÃO CADASTRAR */
.btn-pink {
    background:#d63384;
    color:white;
    border-radius:8px;
}
.btn-pink:hover {
    background:#b0266a;
    color:white;
}

/* ------------------- */
/* ESTILO DOS AÇÕES IGUAL AO DE USUÁRIO */
.btn-edit {
    background:#ffd6e8;
    border:none;
    color:#d63384;
    padding:6px 12px;
    border-radius:8px;
    transition:.2s;
}
.btn-edit:hover { background:#ffb3d9; }

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

<h1 class="titulo">📚 Lista de Livros</h1>

<div class="container">

<a href="cria_livro.php" class="btn btn-pink mb-3">
    <i class="fa fa-plus"></i> Cadastrar Livro
</a>

<table class="table table-bordered table-striped align-middle">
<thead>
<tr>
    <th>ID</th>
    <th>Título</th>
    <th>Autor</th>
    <th>Editora</th>
    <th>Ano</th>
    <th style="width:140px;">Ações</th>
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

       
        <a href="edita_livro.php?id=<?= $l['id'] ?>" class="btn-edit">
            <i class="fa-solid fa-pen"></i>
        </a>

       
        <a href="deleta_livro.php?id=<?= $l['id'] ?>"
           class="btn-delete"
           onclick="return confirm('Tem certeza que deseja excluir este livro?');">
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
