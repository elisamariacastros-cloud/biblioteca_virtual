<?php 
session_start();
include "../conexao.php";

// Mostrando mensagem de sucesso (se existir)
if (isset($_SESSION['sucesso'])) {
    echo "<script>alert('{$_SESSION['sucesso']}');</script>";
    unset($_SESSION['sucesso']);
}

// Buscando todos os livros do banco
$sql = "SELECT * FROM livros";
$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Virtual - Livros</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #ffe6f2;
        }

        .titulo {
            text-align: center;
            margin-top: 30px;
            font-weight: 700;
            color: #d63384;
        }

        .card {
            border: none;
            border-radius: 15px;
            transition: 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(255, 20, 147, 0.3);
        }

        .card-img-top {
            border-radius: 12px;
            height: 300px;
            object-fit: cover;
            width: 100%;
        }

        .btn-pink {
            background-color: #d63384;
            color: white;
            border-radius: 8px;
        }

        .btn-pink:hover {
            background-color: #b0266a;
            color: white;
        }

        footer {
            margin-top: 40px;
            padding: 15px;
            background: #d63384;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>

    <h1 class="titulo">📚 Biblioteca Virtual – Ebooks</h1>

    <div class="container mt-4">
        <div class="row g-4">

            <?php while ($livro = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-4">
                    <div class="card p-2 shadow-sm">

                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $livro["Titulo"]; ?></h5>

                            <p class="text-muted">
                                <?php echo $livro["Autor"]; ?>
                            </p>

                            <!-- Botão detalhes enviando ID -->
                            <a href="detalhes.php?id=<?php echo $livro["idLivros"]; ?>" class="btn btn-pink">
                                Ver Detalhes
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>

    <footer>
        Biblioteca Virtual © 2025 – Desenvolvido por Elisa e Livya 💗
    </footer>

</body>

</html>
