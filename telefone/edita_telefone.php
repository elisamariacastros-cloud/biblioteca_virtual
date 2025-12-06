<?php
include '../conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM telefone WHERE id = $id LIMIT 1";
$result = mysqli_query($conexao, $sql);
$tel = mysqli_fetch_assoc($result);

$usuarios = mysqli_query($conexao, "SELECT id, nome FROM usuario ORDER BY nome");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Editar Telefone</title>

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
<h3 class="text-center mb-3">Editar Telefone</h3>

<form action="atualiza_telefone.php" method="post">

    <input type="hidden" name="id" value="<?= $tel['id'] ?>">

    <label class="form-label">Usuário</label>
    <select name="usuario_id" class="form-control mb-3">
        <?php while($u = mysqli_fetch_assoc($usuarios)): ?>
            <option value="<?= $u['id'] ?>" <?= $u['id']==$tel['usuario_id'] ? "selected" : "" ?>>
                <?= $u['nome'] ?>
            </option>
        <?php endwhile; ?>
    </select>

    <label class="form-label">DDD</label>
    <input type="text" name="DDD" maxlength="3" class="form-control mb-3" value="<?= $tel['DDD'] ?>" required>

    <label class="form-label">Telefone</label>
    <input type="text" name="telefone" class="form-control mb-3" value="<?= $tel['telefone'] ?>" required>

    <button class="btn btn-pink w-100">Salvar Alterações</button>

</form>
</div>

</body>
</html>
