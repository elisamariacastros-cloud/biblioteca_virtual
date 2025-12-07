<?php
session_start();
include "../conexao.php";

// PROCESSAR O FORMULÁRIO
if(isset($_POST['salvar'])){
    $nome = mysqli_real_escape_string($conexao, $_POST["nome"]);
    $email = mysqli_real_escape_string($conexao, $_POST["email"]);
    $senha = $_POST["senha"]; 
    $idade = (int)$_POST["idade"];
    $telefone = mysqli_real_escape_string($conexao, $_POST["telefone"]);

    // Validações
    if(strlen($senha) < 8){
        echo "<script>alert('Senha precisa ter ao menos 8 caracteres'); history.back();</script>";
        exit;
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<script>alert('Email inválido'); history.back();</script>";
        exit;
    }
    if($idade < 1 || $idade > 120){
        echo "<script>alert('Idade deve ser entre 1 e 120'); history.back();</script>";
        exit;
    }

    // INSERT
    $sql = "INSERT INTO usuario (nome, email, senha, idade, telefone) 
            VALUES ('$nome', '$email', '$senha', $idade, '$telefone')";

    if(mysqli_query($conexao, $sql)){
        $_SESSION['sucesso'] = "Usuário cadastrado com sucesso!";
        header("Location: login.php");
        exit;
    } else {
        echo "<script>alert('Erro ao cadastrar usuário'); history.back();</script>";
        exit;
    }
}

mysqli_close($conexao);
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Adicionar Usuário — Biblioteca Virtual</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    :root{
      --pink-50: #fff0f6;
      --pink-200: #ff9ccf;
      --pink-500: #ff4da6;
      --pink-700: #e03280;
      --muted: #6c6c6c;
    }

    body {
      background: #ffe6f2;
      padding: 2rem;
    }

    .card-form {
      max-width: 600px;
      margin: auto;
      border-radius: 14px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.08);
      background: #fff;
      padding: 2rem;
    }

    .btn-pink {
      background: linear-gradient(90deg,var(--pink-500),var(--pink-700));
      border: none;
      color: white;
      font-weight: 600;
    }

  </style>
</head>

<body>

<div class="card-form">
      <h4 class="mb-3 text-center">Cadastrar Usuário</h4>

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
            <div class="input-group">
                <input required type="password" class="form-control" id="senha" name="senha">
                <button type="button" class="btn btn-outline-secondary" id="togglePwd">
                    <i class="fa fa-eye-slash" id="iconEye"></i>
                </button>
            </div>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Idade</label>
            <input required type="number" class="form-control" name="idade">
        </div>

        <div class="mb-3">
            <label class="form-label">Telefone</label>
            <input required type="text" class="form-control" name="telefone">
        </div>

        <button type="submit" class="btn btn-pink w-100" name="salvar">Salvar</button>
      </form>

      
</div>

<script>
document.getElementById('togglePwd').addEventListener('click', function () {
    const input = document.getElementById('senha');
    const icon = document.getElementById('iconEye');

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    }
});
</script>
</body>
</html>
