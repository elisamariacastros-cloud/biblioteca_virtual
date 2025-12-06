<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<title>Cadastrar Livro</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
:root{
  --pink:#d63384;
  --pink-dark:#b0266a;
}
body{
  background:#ffe6f2;
  min-height:100vh;
  display:flex;
  align-items:center;
  justify-content:center;
  padding:2rem;
}
.card-form{
  background:white;
  padding:2rem;
  border-radius:14px;
  width:100%;
  max-width:750px;
  box-shadow:0 8px 25px rgba(214,51,132,0.2);
}
.btn-pink{
  background:var(--pink);
  color:white;
}
.btn-pink:hover{
  background:var(--pink-dark);
  color:white;
}
</style>
</head>

<body>
<div class="card-form">

<h3 class="text-center mb-3" style="color:#d63384;">Cadastrar Livro</h3>

<form action="insere_livro.php" method="post">

<div class="row">
  <div class="col-md-6 mb-3">
    <label class="form-label">Título</label>
    <input type="text" class="form-control" name="titulo" required>
  </div>

  <div class="col-md-6 mb-3">
    <label class="form-label">Autor</label>
    <input type="text" class="form-control" name="autor" required>
  </div>
</div>

<div class="row">
  <div class="col-md-6 mb-3">
    <label class="form-label">Editora</label>
    <input type="text" class="form-control" name="editora">
  </div>

  <div class="col-md-6 mb-3">
    <label class="form-label">Ano Publicação</label>
    <input type="number" class="form-control" name="anoPublicacao">
  </div>
</div>

<div class="row">
  <div class="col-md-6 mb-3">
    <label class="form-label">Número de Páginas</label>
    <input type="number" class="form-control" name="numeroPagina">
  </div>

  <div class="col-md-6 mb-3">
    <label class="form-label">Indicação de Idade</label>
    <input type="number" class="form-control" name="indicacaoIdade">
  </div>
</div>

<div class="mb-3">
  <label class="form-label">Descrição</label>
  <input type="text" class="form-control" name="descricao">
</div>

<div class="mb-3">
  <label class="form-label">Sinopse</label>
  <textarea class="form-control" name="sinopse"></textarea>
</div>

<button type="submit" class="btn btn-pink w-100">Cadastrar</button>

</form>
</div>
</body>
</html>
