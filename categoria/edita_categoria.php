<?php
include '../conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM categoria WHERE id = $id LIMIT 1";
$result = mysqli_query($conexao, $sql);
$cat = mysqli_fetch_assoc($result);

$livros = mysqli_query($conexao, "SELECT id, titulo FROM livro ORDER BY titulo");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Editar Categoria</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background:#ffe6f2; }
.card-form {
    max-width:600px;
    margin:40px auto;
    padding:25px;
    background:white;
    border-radius:12px;
    box-shadow:0 0 20px rgba(214,51,132,0.3);
}
.btn-pink { background:#d63384;color:white; }
.btn-pink:hover { background:#b0266a; }
</style>
</head>

<body>

<div class="card-form">

<h3 class="text-center mb-3">Editar Categoria</h3>

<form action="atualiza_categoria.php" method="post">

    <input type="hidden" name="id" value="<?= $cat['id'] ?>">

    <label class="form-label">Livro</label>
    <select name="livro_id" class="form-control mb-3">
        <?php while($l = mysqli_fetch_assoc($livros)) : ?>
            <option value="<?= $l['id'] ?>" <?= ($l['id']==$cat['livro_id']) ? "selected" : "" ?>>
                <?= $l['titulo'] ?>
            </option>
        <?php endwhile; ?>
    </select>

    <label class="form-label">Nome da Categoria</label>
    <input type="text" name="nome" class="form-control mb-3" value="<?= $cat['nome'] ?>" required>

    <button class="btn btn-pink w-100">Salvar Alterações</button>

</form>

</div>

</body>
</html>
