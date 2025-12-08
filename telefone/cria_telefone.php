<?php
include '../conexao.php';

$usuarios = mysqli_query($conexao, "SELECT id, nome FROM usuario ORDER BY nome");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Cadastrar Telefone</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background:#ffe6f2; }
.card-form {
    max-width:600px;
    margin:40px auto;
    padding:25px;
    border-radius:12px;
    background:white;
    box-shadow:0 0 20px rgba(214,51,132,0.2);
}
.btn-pink { background:#d63384;color:white; }
.btn-pink:hover { background:#b0266a; }
</style>
</head>

<body>

<div class="card-form">
<h3 class="text-center mb-3">Cadastrar Telefone</h3>

<form action="processa_telefone.php" method="post">

    <label class="form-label">Usuário</label>
    <select name="usuario_id" class="form-control mb-3" required>
        <option value="">Selecione...</option>
        <?php while($u = mysqli_fetch_assoc($usuarios)) : ?>
            <option value="<?= $u['id'] ?>"><?= $u['nome'] ?></option>
        <?php endwhile; ?>
    </select>

    <label class="form-label">DDD</label>
    <input type="text" name="DDD" maxlength="3" class="form-control mb-3" required>

    <label class="form-label">Telefone</label>
    <input type="text" name="telefone" class="form-control mb-3" required>

    <button class="btn btn-pink w-100">Cadastrar</button>
</form>
</div>

</body>
</html>
