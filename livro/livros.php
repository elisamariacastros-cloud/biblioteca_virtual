<?php 
session_start();
include "../conexao.php";

$sql = "SELECT * FROM livro ORDER BY id DESC";
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Biblioteca Virtual - Livros</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background:#ffe6f2; }

.titulo {
    text-align:center;
    margin-top:30px;
    font-weight:700;
    color:#d63384;
}

.card-livro {
    border:none;
    border-radius:15px;
    padding:15px;
    transition:.3s;
    background:white;
}
.card-livro:hover {
    transform:scale(1.05);
    box-shadow:0 4px 15px rgba(255,20,147,0.3);
}

.card-img {
    width:100%;
    height:300px;
    object-fit:cover;
    border-radius:12px;
}

.btn-pink {
    background:#d63384;
    color:white;
    border-radius:8px;
}
.btn-pink:hover { background:#b0266a; color:white; }

footer {
    margin-top:40px;
    padding:15px;
    background:#d63384;
    color:white;
    text-align:center;
}

.secao-titulo {
    text-align: center;
    color: #d63384;
    font-weight: bold;
    margin-top: 40px;
    margin-bottom: 20px;
}

.divisor {
    border: 2px solid #d63384;
    margin-bottom: 30px;
}

.logout-card {
    max-width: 300px;
    margin: 0 auto 50px auto;
}
</style>

</head>
<body>

<h1 class="titulo">📚 Biblioteca Virtual – Ebooks</h1>

<div class="container mt-4">
    <div class="row g-4">

        <?php while($livro = mysqli_fetch_assoc($resultado)) : ?>

        <div class="col-md-4">
            <div class="card-livro shadow-sm">

                <img src="<?= $livro['capa'] ?>" class="card-img" alt="Capa do livro">

                <div class="text-center mt-3">
                    <h5 class="fw-bold"><?= $livro['titulo'] ?></h5>
                    <p class="text-muted"><?= $livro['autor'] ?></p>

                    <a href="detalhes.php?id=<?= $livro['id'] ?>" class="btn btn-pink w-100 mt-2">
                        Ver Detalhes
                    </a>
                </div>

            </div>
        </div>

        <?php endwhile; ?>

    </div>

    <!-- SEÇÃO LOGOUT -->
    <h2 class="secao-titulo">Logout</h2>
    <hr class="divisor">

    <div class="logout-card card shadow-sm text-center p-3">
        <h5 class="card-title">Sair do Sistema</h5>
        <a href="../usuario/login.php" class="btn btn-danger mt-2 w-100">Logout</a>
    </div>

</div>

<footer>
    Biblioteca Virtual © 2025 – Desenvolvido por Elisa e Livya 💗
</footer>

</body>
</html>
