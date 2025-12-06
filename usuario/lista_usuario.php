<?php
include '../conexao.php';

$pesquisa = $_GET['pesquisa'] ?? '';

if (empty($pesquisa)) {
    $sql = "SELECT * FROM usuario";
} else {
    $pesquisa = mysqli_real_escape_string($conexao, $pesquisa);
    $sql = "SELECT * FROM usuario 
            WHERE nome LIKE '%$pesquisa%'
               OR email LIKE '%$pesquisa%'
               OR telefone LIKE '%$pesquisa%'
               OR idade LIKE '%$pesquisa%'";
}

$resultado = mysqli_query($conexao, $sql);
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Usuários — Biblioteca Virtual</title>

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
      background:linear-gradient(180deg,var(--pink-50),#fff 70%);
      padding:2rem;
      font-family:Inter, system-ui, sans-serif;
    }

    .card-table {
      border:0;
      border-radius:14px;
      box-shadow:0 8px 30px rgba(224,50,128,0.12);
      background:#fff;
      padding:2rem;
      max-width:1100px;
      margin:auto;
    }

    .table thead {
      background:var(--pink-200);
      color:#fff;
    }

    .btn-pink {
      background:linear-gradient(90deg,var(--pink-500),var(--pink-700));
      border:none;
      color:#fff;
      box-shadow:0 6px 18px rgba(224,50,128,0.18);
    }

    .search-box input {
      border-radius:10px;
    }

    .search-box input:focus {
      border-color:var(--pink-500);
      box-shadow:0 0 0 0.15rem rgba(255,77,166,0.2);
    }

    .title {
      font-weight:600;
      color:var(--pink-700);
      text-align:center;
      margin-bottom:1rem;
    }

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
      color:#fff;
      padding:6px 12px;
      border-radius:8px;
      transition:.2s;
    }
    .btn-delete:hover { background:#ff7b7b; }

  </style>
</head>

<body>

<div class="card-table">

    <h3 class="title">Lista de Usuários</h3>

    <!-- CAMPO DE PESQUISA -->
    <form method="GET" class="search-box mb-4">
        <input 
            type="text" 
            name="pesquisa" 
            class="form-control"
            placeholder="Buscar por nome, email, idade ou telefone…"
            value="<?= $pesquisa ?>"
        >
    </form>

    <!-- TABELA -->
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Idade</th>
                    <th>Telefone</th>
                    <th style="width:140px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($linha = mysqli_fetch_assoc($resultado)) : ?>
                <tr>
                    <td><?= $linha['id'] ?></td>
                    <td><?= $linha['nome'] ?></td>
                    <td><?= $linha['email'] ?></td>
                    <td><?= $linha['idade'] ?></td>
                    <td><?= $linha['telefone'] ?></td>

                    <td>
                        <a href="edita_usuario.php?id=<?= $linha['id'] ?>" class="btn-edit">
                            <i class="fa-solid fa-pen"></i>
                        </a>

                        <a 
                          href="excluir_usuario.php?id=<?= $linha['id'] ?>" 
                          class="btn-delete"
                          onclick="return confirm('Tem certeza que deseja excluir este usuário?');"
                        >
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <a href="cria_usuario.php" class="btn btn-pink w-100 mt-3">Cadastrar Novo Usuário</a>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
