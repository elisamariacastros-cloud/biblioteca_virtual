<?php 
session_start();
include "conexao.php";

if(isset($_POST['Cadastrar-se'])){

    $nome = mysqli_real_escape_string($conexao, $_POST["nome"]);
    $email = mysqli_real_escape_string($conexao, $_POST["email"]);
    $senha = mysqli_real_escape_string($conexao, $_POST["senha"]);
    $idade = (int) $_POST["idade"]; 
    $telefone = mysqli_real_escape_string($conexao, $_POST["telefone"]);

    $sql = "INSERT INTO usuario (nome, email, senha, idade, telefone)
            VALUES ('$nome', '$email', '$senha', $idade, '$telefone')";

    if (mysqli_query($conexao, $sql)) {
        header("Location: cadastro.php?sucesso=1"); 
        exit;
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
}

?>


<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastrar — Biblioteca Virtual</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

  <style>
    :root{
      --pink-50: #fff0f6;
      --pink-100: #ffd6e8;
      --pink-200: #ff9ccf;
      --pink-500: #ff4da6;
      --pink-700: #e03280;
      --muted: #6c6c6c;
    }

    body {
      min-height: 100vh;
      background: linear-gradient(180deg, var(--pink-50) 0%, #ffffff 50%);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
      font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }

    .card-login {
      border: 0;
      border-radius: 14px;
      box-shadow: 0 8px 30px rgba(224,50,128,0.12);
      overflow: hidden;
      max-width: 920px;
      width: 100%;
      background: white;
      display: flex;
      flex-direction: row;
    }

    .card-right {
      padding: 2.5rem;
      flex: 1;
    }

    .form-control:focus {
      box-shadow: 0 0 0 0.2rem rgba(255,77,166,0.18);
      border-color: var(--pink-500);
    }

    .btn-pink {
      background: linear-gradient(90deg,var(--pink-500),var(--pink-700));
      border: none;
      color: white;
      box-shadow: 0 6px 18px rgba(224,50,128,0.18);
    }

    .small-muted { color: var(--muted); font-size:.9rem; }

  </style>
</head>

<body>

<div class="card-login">

    <div class="card-right">
      <h4 class="mb-3">Cadastrar-se</h4>
      <p class="small-muted mb-4">Preencha os dados.</p>
      <?php
if (isset($_GET['sucesso'])) {
    echo "<div style='padding: 10px; background: #d4f8d4; color: #0d730d;
                border: 1px solid #0d730d; margin-bottom: 15px;'>
            Cadastro realizado com sucesso!
          </div>";
}
?>

      <form action="" method="post">

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input required type="text" class="form-control" name="nome" placeholder="Nome Completo">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input required type="email" class="form-control" name="email" placeholder="seu@exemplo.com">
        </div>

        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input required type="password" class="form-control" name="senha">
        </div>

        <div class="mb-3">
            <label class="form-label">Idade</label>
            <input required type="number" class="form-control" name="idade" placeholder="18">
        </div>

        <div class="mb-3">
            <label class="form-label">Telefone</label>
            <input required type="text" class="form-control" name="telefone" placeholder="37998746447">
        </div>

        <button type="submit" class="btn btn-pink btn-lg w-100" name="Cadastrar-se">
          Cadastrar-se
        </button>

      </form>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
