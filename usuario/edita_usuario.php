<?php
include '../conexao.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    $erro = "ID do usuário não informado!";
} else {
    $id = intval($_GET['id']);

    $sql = "SELECT * FROM usuario WHERE id = $id LIMIT 1";
    $resultado = mysqli_query($conexao, $sql);

    if (!$resultado || mysqli_num_rows($resultado) == 0) {
        $erro = "Usuário não encontrado!";
    } else {
        $linha = mysqli_fetch_assoc($resultado);
    }
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Editar Usuário — Biblioteca Virtual</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

  <style>
    :root{
      --pink-50:#fff0f6;
      --pink-200:#ff9ccf;
      --pink-500:#ff4da6;
      --pink-700:#e03280;
      --muted:#6c6c6c;
    }

    body {
      min-height:100vh;
      background:linear-gradient(180deg,var(--pink-50),#fff 60%);
      display:flex;
      align-items:center;
      justify-content:center;
      padding:2rem;
      font-family:Inter,system-ui;
    }

    .card-edit {
      border:0;
      border-radius:14px;
      box-shadow:0 8px 30px rgba(224,50,128,0.12);
      overflow:hidden;
      width:100%;
      max-width:900px;
      background:#fff;
      padding:2.5rem;
    }

    .form-control:focus {
      box-shadow:0 0 0 .2rem rgba(255,77,166,0.18);
      border-color:var(--pink-500);
    }

    .btn-pink {
      background:linear-gradient(90deg,var(--pink-500),var(--pink-700));
      border:none;
      color:#fff;
      box-shadow:0 6px 18px rgba(224,50,128,0.18);
    }

    .small-muted {
      color:var(--muted);
      font-size:.9rem;
    }

    .alert-custom {
      background:var(--pink-200);
      color:#fff;
      border:none;
      border-radius:10px;
      padding:1rem;
      text-align:center;
    }
  </style>
</head>

<body>

<div class="card-edit">

<?php if(isset($erro)) : ?>

  <div class="alert-custom mb-4">
      <i class="fa-solid fa-circle-exclamation"></i>
      <b><?= $erro ?></b>
  </div>

  <a href="cria_usuario.php" class="btn btn-secondary w-100">Voltar</a>

<?php else: ?>

  <h4 class="mb-3">Editar Usuário</h4>
  <p class="small-muted mb-4">Modifique os dados e confirme.</p>

  <form action="form_usuario.php" method="post">

    <input type="hidden" name="id" value="<?= $linha['id'] ?>">

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input required type="text" class="form-control" name="nome" value="<?= $linha['nome'] ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input required type="email" class="form-control" name="email" value="<?= $linha['email'] ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Idade</label>
        <input required type="number" class="form-control" name="idade" value="<?= $linha['idade'] ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Telefone</label>
        <input required type="text" class="form-control" name="telefone" value="<?= $linha['telefone'] ?>">
    </div>

    <button type="submit" class="btn btn-pink btn-lg w-100 mt-2">Atualizar</button>
  </form>

  <a href="lista_usuario.php" class="btn btn-light w-100 mt-3">Voltar</a>

<?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
