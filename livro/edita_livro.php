<?php
include '../conexao.php';

$id = $_GET['id'];
$sql = "SELECT * FROM livro WHERE id=$id LIMIT 1";
$res = mysqli_query($conexao, $sql);
$livro = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Editar Livro</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
  background:#ffe6f2;
  display:flex;
  justify-content:center;
  align-items:center;
  height:100vh;
}
.card-edit{
  background:white;
  padding:2rem;
  width:100%;
  max-width:750px;
  border-radius:14px;
  box-shadow:0 6px 25px rgba(214,51,132,0.2);
}
.btn-pink{
    background:#d63384;
    color:white;
}
.btn-pink:hover{
    background:#b0266a;
    color:white;
}
</style>
</head>

<body>

<div class="card-edit">
<h3 class="text-center mb-3" style="color:#d63384;">Editar Livro</h3>

<form action="atualiza_livro.php" method="post">

<input type="hidden" name="id" value="<?= $livro['id'] ?>">

<div class="row">
  <div class="col-md-6 mb-3">
    <label>Título</label>
    <input type="text" class="form-control" name="titulo" value="<?= $livro['titulo'] ?>">
  </div>

  <div class="col-md-6 mb-3">
    <label>Autor</label>
    <input type="text" class="form-control" name="autor" value="<?= $livro['autor'] ?>">
  </div>
</div>

<div class="row">
  <div class="col-md-6 mb-3">
    <label>Editora</label>
    <input type="text" class="form-control" name="editora" value="<?= $livro['editora'] ?>">
  </div>

  <div class="col-md-6 mb-3">
    <label>Ano</label>
    <input type="number" class="form-control" name="anoPublicacao" value="<?= $livro['anoPublicacao'] ?>">
  </div>
</div>

<div class="row">
  <div class="col-md-6 mb-3">
    <label>Páginas</label>
    <input type="number" class="form-control" name="numeroPagina" value="<?= $livro['numeroPagina'] ?>">
  </div>

  <div class="col-md-6 mb-3">
    <label>Indicação de Idade</label>
    <input type="number" class="form-control" name="indicacaoIdade" value="<?= $livro['indicacaoIdade'] ?>">
  </div>
</div>

<div class="mb-3">
  <label>Descrição</label>
  <input type="text" class="form-control" name="descricao" value="<?= $livro['descricao'] ?>">
</div>

<div class="mb-3">
  <label>Sinopse</label>
  <textarea class="form-control" name="sinopse"><?= $livro['sinopse'] ?></textarea>
</div>

<button class="btn btn-pink w-100">Atualizar</button>

</form>

</div>

</body>
</html>
