<?php
session_start();
include "../conexao.php";

// Pega ID vindo da URL
$id = $_GET["id"] ?? 0;

// Consulta no banco
$sql = "SELECT * FROM livro WHERE id = $id";
$result = mysqli_query($conexao, $sql);

// Se não encontrou nenhum livro
if (mysqli_num_rows($result) == 0) {
    echo "<h3>Livro não encontrado!</h3>";
    exit;
}

$livro = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $livro['titulo'] ?></title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { 
    background: #ffe6f2;
    padding-bottom: 30px;
}

.card-livro {
    padding: 20px;
    border-radius: 15px;
    background: white;
    box-shadow: 0 4px 15px rgba(255,20,147,0.25);
    margin-top: 20px;
}

/* Imagem responsiva */
.capa {
    width: 100%;
    max-width: 320px;
    height: auto;
    max-height: 450px;
    object-fit: cover;
    border-radius: 10px;
    margin: auto;
    display: block;
}

.btn-pink {
    background: #d63384;
    color: white;
    font-weight: bold;
    border-radius: 10px;
    padding: 12px;
    font-size: 1.1rem;
    border: none;
}

.btn-pink:hover { 
    background: #b0266a; 
    color: white;
}

h1 { 
    color: #d63384; 
    font-weight: bold;
    font-size: clamp(1.5rem, 5vw, 2.2rem);
    text-align: center;
    margin-bottom: 20px;
}

/* Para telas pequenas (celulares) */
@media (max-width: 576px) {
    .container {
        padding: 10px;
        margin-top: 15px;
    }
    
    .card-livro {
        padding: 15px;
        margin-top: 10px;
    }
    
    h1 {
        font-size: 1.6rem;
    }
    
    .capa {
        max-width: 280px;
        max-height: 380px;
        margin-bottom: 20px;
    }
    
    .btn-pink, .btn-secondary {
        font-size: 1rem;
        padding: 10px;
    }
}

/* Para tablets */
@media (min-width: 768px) {
    .capa {
        max-width: 350px;
        max-height: 500px;
    }
    
    .card-livro {
        padding: 25px;
    }
}

/* Para telas grandes */
@media (min-width: 992px) {
    .container {
        max-width: 800px;
        margin-top: 40px;
    }
    
    .capa {
        max-width: 380px;
        max-height: 530px;
    }
}

/* Estilo para os textos */
p {
    font-size: 1rem;
    line-height: 1.5;
    margin-bottom: 15px;
}

strong {
    color: #d63384;
}

hr {
    border-color: #d63384;
    margin: 25px 0;
}

.btn-secondary {
    padding: 12px;
    font-size: 1.1rem;
}
</style>
</head>

<body>

<div class="container">
    <div class="card-livro">
        
        <h1><?= htmlspecialchars($livro['titulo']) ?></h1>
        
        <img src="<?= htmlspecialchars($livro['capa']) ?>" 
             class="capa mt-3 mb-4"
             alt="Capa do livro <?= htmlspecialchars($livro['titulo']) ?>"
             onerror="this.src='https://via.placeholder.com/300x400/ffe6f2/d63384?text=Capa+Indisponível'">
        
        <div class="row">
            <div class="col-12 col-md-6">
                <p><strong>Autor:</strong> <?= htmlspecialchars($livro['autor']) ?></p>
                <p><strong>Editora:</strong> <?= htmlspecialchars($livro['editora']) ?></p>
                <p><strong>Ano de Publicação:</strong> <?= htmlspecialchars($livro['anoPublicacao']) ?></p>
            </div>
            <div class="col-12 col-md-6">
                <p><strong>Nº de Páginas:</strong> <?= htmlspecialchars($livro['numeroPagina']) ?></p>
                <p><strong>Indicação de Idade:</strong> <?= htmlspecialchars($livro['indicacaoIdade']) ?></p>
            </div>
        </div>
        
        <hr>
        
        <div class="mb-4">
            <p><strong>Descrição:</strong><br><?= nl2br(htmlspecialchars($livro['descricao'])) ?></p>
        </div>
        
        <div class="mb-4">
            <p><strong>Sinopse:</strong><br><?= nl2br(htmlspecialchars($livro['sinopse'])) ?></p>
        </div>
        
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <a href="#" onclick="alert('Download simulado 😊');" class="btn btn-pink w-100">
                    📥 Baixar PDF
                </a>
            </div>
            <div class="col-12 col-md-6">
                <a href="livros.php" class="btn btn-secondary w-100">⬅ Voltar para Livros</a>
            </div>
        </div>
        
    </div>
</div>

<script>
// Pequeno script para melhor experiência em mobile
if (window.innerWidth < 768) {
    // Adiciona classe extra para mobile
    document.querySelector('.card-livro').classList.add('p-3');
}
</script>

</body>
</html>