<?php
include "../conexao.php";

$usuarios = mysqli_query($conexao, "SELECT id, nome FROM usuario WHERE perfil='U'");
$livros = mysqli_query($conexao, "SELECT id, titulo FROM livro");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Registrar Download</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background:#ffe6f2; min-height:100vh; display:flex; align-items:center; justify-content:center; }
.card-form { background:white; padding:2rem; border-radius:14px; width:100%; max-width:650px; box-shadow:0 8px 25px rgba(214,51,132,0.2); }
.btn-pink { background:#d63384; color:white; }
.btn-pink:hover { background:#b0266a; color:white; }
</style>
</head>

<body>
<div class="card-form">

<h3 class="text-center mb-3" style="color:#d63384;">Registrar Download</h3>

<form action="insere_download.php" method="post">

<div class="mb-3">
<label>Usuário</label>
<select name="usuario_id" class="form-control" required>
    <option value="">Selecione</option>
    <?php while($u = mysqli_fetch_assoc($usuarios)): ?>
        <option value="<?= $u['id'] ?>"><?= $u['nome'] ?></option>
    <?php endwhile; ?>
</select>
</div>

<div class="mb-3">
<label>Livro</label>
<select name="livro_id" class="form-control" required>
    <option value="">Selecione</option>
    <?php while($l = mysqli_fetch_assoc($livros)): ?>
        <option value="<?= $l['id'] ?>"><?= $l['titulo'] ?></option>
    <?php endwhile; ?>
</select>
</div>

<button type="submit" class="btn btn-pink w-100">Registrar</button>

</form>
</div>
</body>
</html>
