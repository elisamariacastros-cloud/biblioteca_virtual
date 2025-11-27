<?php 
session_start();
include "conexao.php";
?>
<?php
// login.php
// Se já houver sessão iniciada, redirecionar (exemplo)
// session_start();
// if (!empty($_SESSION['user_id'])) header('Location: dashboard.php');
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Entrar — Biblioteca Virtual</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome (opcional para ícones) -->
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
      display:flex;
      gap:.6rem;
      align-items:center;
      font-weight:700;
      font-size:1.25rem;
    }
    .brand .logo {
      width:48px;
      height:48px;
      border-radius:10px;
      background: rgba(255,255,255,0.14);
      display:flex;
      align-items:center;
      justify-content:center;
      font-weight:700;
      font-size:1.2rem;
    }

    .card-right {
      padding: 2.5rem;
      background: white;
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

    /* Responsividade: empilha no mobile */
    @media (max-width: 767.98px) {
      .card-left { align-items:center; text-align:center; padding:1.8rem; }
      .card-left .brand { justify-content:center; }
    }
  </style>
</head>
<body>

  
    <!-- Lado direito: formulário -->
    <div class="card-right col-lg-7">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-9 col-lg-10">

            <h4 class="mb-3">Cadastrar-se</h4>
            <p class="small-muted mb-4">Preencha os dados.</p>

            <!-- Formulário: enviar para login_handler.php -->
            <form action="login_handler.php" method="post" novalidate>
                 <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input required type="nome" class="form-control" id="nome" name="nome" placeholder="Nome Completo" autofocus>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input required type="email" class="form-control" id="email" name="email" placeholder="seu@exemplo.com" autofocus>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <div class="input-group">
                  <input required type="password" class="form-control" id="password" name="password" placeholder="••••••••">
                  <button type="button" class="btn btn-outline-secondary" id="togglePwd" aria-label="Mostrar senha">
                    <i class="fa fa-eye"></i>
                  </button>
                </div>
              </div>
            
              <form action="login_handler.php" method="post" novalidate>
              <div class="mb-3">
                <label for="idade" class="form-label">Idade</label>
                <input required type="idade" class="form-control" id="idade" name="idade" placeholder="02/04/2009" autofocus>
              </div>
            <form action="login_handler.php" method="post" novalidate>
              <div class="mb-3">
                <label for="numero" class="form-label">Celular</label>
                <input required type="numero" class="form-control" id="celular" name="celular" placeholder="37998746447" autofocus>
              </div>

             <div class="d-grid mb-3">
              <a href="livros.php" class="btn btn-pink btn-lg">Cadastrar-se</a>
            </div>
            </form>

            <hr class="my-4">
            </div>

            <!-- espaço para mensagens de erro vindo do PHP (ex: ?error=1) -->
            <?php if (!empty($_GET['error'])): ?>
              <div class="alert alert-danger mt-3" role="alert">
                <?= htmlspecialchars($_GET['error']) ?>
              </div>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (Popper incluido) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
