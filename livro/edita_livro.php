<?php
include '../conexao.php';

$id = $_GET['id'] ?? 0;
$sql = "SELECT * FROM livro WHERE id = $id LIMIT 1";
$res = mysqli_query($conexao, $sql);
$livro = mysqli_fetch_assoc($res);

if (!$livro) {
    echo "<h3>Livro não encontrado.</h3>";
    exit;
}
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
  align-items:flex-start;
  padding:40px 20px;
  min-height:100vh;
}
.card-edit{
  background:white;
  padding:2rem;
  width:100%;
  max-width:900px;
  border-radius:14px;
  box-shadow:0 6px 25px rgba(214,51,132,0.18);
}
.btn-pink{
    background:#d63384;
    color:white;
    border-radius:8px;
    border:none;
    padding:10px 14px;
}
.btn-pink:hover{
    background:#b0266a;
    color:white;
}
.capa-preview{
    width:160px;
    height:230px;
    object-fit:cover;
    border-radius:8px;
    border:1px solid #eee;
    display:block;
    margin-bottom:10px;
}
.small-muted { font-size:0.85rem; color:#666; }
.row-gap { gap: 1rem; display:flex; flex-wrap:wrap; }
@media(min-width:768px){ .row-gap .col-md-6{ flex: 0 0 48%; } }
</style>
</head>

<body>

<div class="card-edit">
<h3 class="text-center mb-3" style="color:#d63384;">Editar Livro</h3>

<form action="atualiza_livro.php" method="post" id="formEditarLivro">

<input type="hidden" name="id" value="<?= htmlspecialchars($livro['id']) ?>">

<div class="row row-gap mb-3">
  <div class="col-md-6 mb-3">
    <label class="form-label">Título</label>
    <input type="text" class="form-control" name="titulo" value="<?= htmlspecialchars($livro['titulo']) ?>" required>
  </div>

  <div class="col-md-6 mb-3">
    <label class="form-label">Autor</label>
    <input type="text" class="form-control" name="autor" value="<?= htmlspecialchars($livro['autor']) ?>" required>
  </div>
</div>

<div class="row row-gap mb-3">
  <div class="col-md-6 mb-3">
    <label class="form-label">Editora</label>
    <input type="text" class="form-control" name="editora" value="<?= htmlspecialchars($livro['editora']) ?>">
  </div>

  <div class="col-md-6 mb-3">
    <label class="form-label">Ano</label>
    <input type="number" class="form-control" name="anoPublicacao" value="<?= htmlspecialchars($livro['anoPublicacao']) ?>">
  </div>
</div>

<div class="row row-gap mb-3">
  <div class="col-md-6 mb-3">
    <label class="form-label">Páginas</label>
    <input type="number" class="form-control" name="numeroPagina" value="<?= htmlspecialchars($livro['numeroPagina']) ?>">
  </div>

  <div class="col-md-6 mb-3">
    <label class="form-label">Indicação de Idade</label>
    <input type="number" class="form-control" name="indicacaoIdade" value="<?= htmlspecialchars($livro['indicacaoIdade']) ?>">
  </div>
</div>

<div class="mb-3">
  <label class="form-label">Descrição</label>
  <input type="text" class="form-control" name="descricao" value="<?= htmlspecialchars($livro['descricao']) ?>">
</div>

<div class="mb-3">
  <label class="form-label">Sinopse</label>
  <textarea class="form-control" name="sinopse" rows="4"><?= htmlspecialchars($livro['sinopse']) ?></textarea>
</div>

<!-- CAMPO DE CAPA: INPUT URL + PREVIEW -->
<div class="mb-3">
  <label class="form-label">Capa (URL da imagem)</label>

  <!-- Preview -->
  <div class="mb-2">
    <?php
$capa = trim($livro['capa']);
$previewCapa = $capa !== "" ? htmlspecialchars($capa) : "https://via.placeholder.com/160x230?text=Sem+Capa";
?>
<img id="previewCapa" src="<?= $previewCapa ?>" class="capa-preview">

  </div>

  <!-- Input para URL -->
  <input type="url" class="form-control" name="capa" id="inputCapa" placeholder="https://exemplo.com/capa.jpg" value="<?= htmlspecialchars($livro['capa']) ?>">
  <div class="small-muted mt-1">Cole a URL da imagem de capa. Será salvo no campo <code>capa</code>.</div>
</div>

<button type="submit" class="btn btn-pink w-100">Atualizar</button>

</form>

</div>

<script>
// Preview instantâneo da capa quando o usuário muda a URL
const inputCapa = document.getElementById('inputCapa');
const preview = document.getElementById('previewCapa');

inputCapa.addEventListener('input', () => {
    const url = inputCapa.value.trim();
    if (!url) {
        preview.src = 'https://via.placeholder.com/160x230?text=Sem+Capa';
        return;
    }
    // tenta carregar a imagem; se falhar, mostra placeholder
    const img = new Image();
    img.onload = () => preview.src = url;
    img.onerror = () => preview.src = 'https://via.placeholder.com/160x230?text=Imagem+inválida';
    img.src = url;
});
</script>

</body>
</html>
