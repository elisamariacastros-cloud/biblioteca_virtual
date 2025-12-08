<?php
include "../conexao.php";

$pesquisa = $_GET['pesquisa'] ?? '';

if (!empty($pesquisa)) {
    $pesquisa = mysqli_real_escape_string($conexao, $pesquisa);

    $sql = "SELECT download.id, 
                   usuario.nome AS usuario,
                   livro.titulo AS livro,
                   download.dataHoraBaixou AS dataHoraDownload
            FROM download
            JOIN usuario ON usuario.id = download.usuario_id
            JOIN livro ON livro.id = download.livro_id
            WHERE usuario.nome LIKE '%$pesquisa%'
               OR livro.titulo LIKE '%$pesquisa%'
               OR download.dataHoraBaixou LIKE '%$pesquisa%'
            ORDER BY download.id DESC";

} else {

    $sql = "SELECT download.id, 
                   usuario.nome AS usuario,
                   livro.titulo AS livro,
                   download.dataHoraBaixou AS dataHoraDownload
            FROM download
            JOIN usuario ON usuario.id = download.usuario_id
            JOIN livro ON livro.id = download.livro_id
            ORDER BY download.id DESC";
}

$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Lista de Downloads</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

<style>
body { background:#ffe6f2; font-family:Inter, sans-serif; }
.titulo { text-align:center; margin:30px 0; font-weight:700; color:#d63384; }
.table thead { background:#d63384; color:white; }
.btn-pink { background:#d63384; color:white; }
.btn-pink:hover { background:#b0266a; color:white; }

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

<h1 class="titulo">📥 Downloads Realizados</h1>

<div class="container">

<a href="cria_download.php" class="btn btn-pink mb-3">+ Registrar Download</a>

<!-- CAMPO DE PESQUISA -->
<form method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="pesquisa" class="form-control"
               placeholder="Pesquisar por usuário, livro ou data..."
               value="<?= htmlspecialchars($pesquisa) ?>">
        <button class="btn btn-pink">
            <i class="fa fa-search"></i>
        </button>
    </div>
</form>

<table class="table table-bordered table-striped align-middle">
<thead>
<tr>
    <th>ID</th>
    <th>Usuário</th>
    <th>Livro</th>
    <th>Data Hora</th>
    <th>Ações</th>
</tr>
</thead>
<tbody>
<?php while($d = mysqli_fetch_assoc($resultado)): ?>
<tr>
    <td><?= $d['id'] ?></td>
    <td><?= $d['usuario'] ?></td>
    <td><?= $d['livro'] ?></td>
    <td><?= date('d-m-Y H:i:s', strtotime($d['dataHoraDownload'])) ?></td>

    <td>
        <a href="edita_download.php?id=<?= $d['id'] ?>" class="btn-edit">
            <i class="fa-solid fa-pen"></i>
        </a>

        <a href="deleta_download.php?id=<?= $d['id'] ?>" 
           class="btn-delete"
           onclick="return confirm('Deseja excluir este download?')">
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
