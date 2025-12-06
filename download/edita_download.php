<?php
include "../conexao.php";

$id = $_GET["id"];

$consulta = mysqli_query($conexao, 
  "SELECT * FROM download WHERE id=$id LIMIT 1"
);
$download = mysqli_fetch_assoc($consulta);

$usuarios = mysqli_query($conexao, "SELECT id, nome FROM usuario WHERE perfil='U'");
$livros = mysqli_query($conexao, "SELECT id, titulo FROM livro");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Editar Download</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background:#ffe6f2; display:flex; align-items:center; justify-content:center; height:100vh; }
.card-edit { background:white; padding:2rem; width:100%; max-width:650px; border-radius:14px; box-shadow:0 6px 25px rgba(214,51,132,0.2); }
.btn-pink { background:#d63384; color:white; }
.btn-pink:hover { background:#b0266a; color:white; }
</style>
</head>

<body>

<div class="card-edit">
<h3 class="text-center mb-3" style="color:#d63384;">Editar Download</h3>

<form action="atualiza_download.php" method="post">

<input type="hidden" name="id" value="<?= $download['id'] ?>">

<div class="mb-3">
<label>Usuário</label>
<select name="usuario_id" class="form-control">
<?php while($u = mysqli_fetch_assoc($usuarios)): ?>
<option value="<?= $u['id'] ?>" 
    <?= $u['id'] == $download['usuario_id'] ? "selected" : "" ?>>
    <?= $u['nome'] ?>
</option>
<?php endwhile; ?>
</select>
</div>

<div class="mb-3">
<label>Livro</label>
<select name="livro_id" class="form-control">
<?php while($l = mysqli_fetch_assoc($livros)): ?>
<option value="<?= $l['id'] ?>" 
    <?= $l['id'] == $download['livro_id'] ? "selected" : "" ?>>
    <?= $l['titulo'] ?>
</option>
<?php endwhile; ?>
</select>
</div>

<button class="btn btn-pink w-100">Atualizar</button>

</form>
</div>

</body>
</html>
