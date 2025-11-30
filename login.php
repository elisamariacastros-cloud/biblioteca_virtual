<?php
session_start();
include "conexao.php"; // conecta ao banco

$mensagem = "";

// Lista dos administradores (PRECISAM estar cadastrados no BD)
$admins = [
    "livyaevelynsiqueira@gmail.com",
    "elisamariacastros@gmail.com"
];

if (isset($_POST["enviar"])) {

    $email = $_POST["email"] ?? "";
    $senha = $_POST["senha"] ?? "";

    // Consulta no banco
    $sql = "SELECT * FROM usuario WHERE email='$email' AND senha='$senha' LIMIT 1";
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {

        // Se o email é admin → vai pro cadastro
        if (in_array($email, $admins)) {
            header("Location: adm.php");
            exit;

        // Se não for admin → vai para a página de livros
        } else {
            header("Location: livros.php");
            exit;
        }

    } else {
        $mensagem = "<div class='alert alert-danger mt-2'>Email ou senha incorretos!</div>";
    }
}

?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Entrar — Biblioteca Virtual</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    :root {
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
      box-shadow: 0 8px 30px rgba(224, 50, 128, 0.12);
      overflow: hidden;
      max-width: 920px;
      width: 100%;
    }

    .card-left {
      background: linear-gradient(180deg, var(--pink-200), var(--pink-500));
      color: white;
      padding: 2.5rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: flex-start;
    }

    .brand {
      display: flex;
      gap: .6rem;
      align-items: center;
      font-weight: 700;
      font-size: 1.25rem;
    }

    .brand .logo {
      width: 48px;
      height: 48px;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.14);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: 1.2rem;
    }

    .card-right {
      padding: 2.5rem;
      background: white;
    }

    .form-control:focus {
      box-shadow: 0 0 0 0.2rem rgba(255, 77, 166, 0.18);
      border-color: var(--pink-500);
    }

    .btn-pink {
      background: linear-gradient(90deg, var(--pink-500), var(--pink-700));
      border: none;
      color: white;
      box-shadow: 0 6px 18px rgba(224, 50, 128, 0.18);
    }

    .small-muted {
      color: var(--muted);
      font-size: .9rem;
    }

    @media (max-width: 767.98px) {
      .card-left {
        align-items: center;
        text-align: center;
        padding: 1.8rem;
      }
      .card-left .brand {
        justify-content: center;
      }
    }
  </style>

</head>

<body>

  <div class="card card-login d-flex flex-row">

    <!-- Lado esquerdo -->
    <div class="card-left col-lg-5 d-none d-lg-flex">
      <div>
        <div class="brand mb-4">
          <div class="logo"><i class="fa-solid fa-book"></i></div>
          Biblioteca Virtual
        </div>

        <h3 class="mb-3">Bem-vinda de volta!</h3>
        <p class="mb-4 small-muted">Seu acervo virtual completo, diversificado e sempre atualizado!</p>

        <ul class="list-unstyled small">
          <li class="mb-2"><i class="fa fa-check-circle me-2"></i>
            <h4>Uma plataforma inteligente, segura e acessível para todos</h4>
          </li>
        </ul>
      </div>
    </div>

    <!-- Lado direito (formulário) -->
    <div class="card-right col-lg-7">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-9 col-lg-10">

            <h4 class="mb-3">Entrar na sua conta</h4>
            <p class="small-muted mb-4">Use seu email e senha para acessar.</p>

            <form action="" method="post" novalidate>
              
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input required type="email" class="form-control" id="email" name="email" placeholder="seu@exemplo.com" autofocus>
              </div>

              <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input required type="password" class="form-control" id="senha" name="senha" placeholder="••••••••">
              </div>

              <!-- MENSAGEM DE ERRO DO PHP -->
              <?= $mensagem ?>

              <div class="d-grid mb-3">
                <button type="submit" name="enviar" class="btn btn-pink btn-lg">Entrar</button>
              </div>

              <div class="text-center small-muted">
                Não tem conta? <a href="cadastro.php">Criar conta</a>
              </div>

            </form>

            <hr class="my-4">

          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
