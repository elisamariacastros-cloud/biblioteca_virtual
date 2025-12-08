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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca Virtual</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Cores rosa */
        body { 
            background-color: #ffe6f2;
            min-height: 100vh;
        }
        
        .titulo {
            text-align: center;
            color: #d63384;
            font-weight: bold;
            padding: 20px;
        }
        
        /* Card dos livros */
        .card-livro {
            background: white;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .card-livro:hover {
            box-shadow: 0 5px 15px rgba(214, 51, 132, 0.2);
        }
        
        /* Imagem dos livros */
        .card-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 8px;
        }
        
        /* Botão rosa */
        .btn-pink {
            background: #d63384;
            color: white;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
        
        .btn-pink:hover {
            background: #b0266a;
            color: white;
        }
        
        /* Rodapé */
        footer {
            background: #d63384;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 40px;
        }
        
        /* Logout */
        .logout-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            max-width: 400px;
            margin: 40px auto;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .btn-danger {
            width: 100%;
            padding: 10px;
        }
        
        /* Para telas pequenas (celulares) */
        @media (max-width: 576px) {
            .titulo {
                font-size: 1.5rem;
                padding: 15px 10px;
            }
            
            .card-img {
                height: 200px;
            }
            
            footer {
                font-size: 0.9rem;
                padding: 12px;
            }
        }
        
        /* Para tablets */
        @media (min-width: 768px) {
            .card-img {
                height: 280px;
            }
        }
    </style>
</head>
<body>

    <!-- Título -->
    <h1 class="titulo">📚 Biblioteca Virtual</h1>
    
    <!-- Container principal -->
    <div class="container">
        
        <!-- Linha com os livros -->
        <div class="row">
            
            <?php while($livro = mysqli_fetch_assoc($resultado)) : ?>
            
            <!-- Cada livro ocupa 12 colunas em celular, 6 em tablet, 4 em computador -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card-livro">
                    
                    <!-- Imagem -->
                    <img src="<?= $livro['capa'] ?>" 
                         class="card-img" 
                         alt="Capa: <?= $livro['titulo'] ?>">
                    
                    <!-- Título e autor -->
                    <div class="text-center mt-3">
                        <h5 class="fw-bold"><?= $livro['titulo'] ?></h5>
                        <p class="text-muted"><?= $livro['autor'] ?></p>
                        
                        <!-- Botão -->
                        <a href="detalhes.php?id=<?= $livro['id'] ?>" 
                           class="btn btn-pink">
                            Ver Detalhes
                        </a>
                    </div>
                    
                </div>
            </div>
            
            <?php endwhile; ?>
            
        </div>
        


        <!-- Seção de logout -->
        <h2 class="text-center text-pink mt-5" style="color: #d63384;">Sair do Sistema</h2>
        
        <div class="logout-card text-center">
            <h5>Deseja sair?</h5>
            <a href="../usuario/login.php" class="btn btn-danger mt-3">
                Sair 👋
            </a>
        </div>
        
    </div>
    
    <!-- Rodapé -->
    <footer>
        Biblioteca Virtual © 2025 – Desenvolvido por Elisa e Livya 💗
    </footer>

</body>
</html>
