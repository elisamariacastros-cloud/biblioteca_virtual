<?php
session_start();
include "../conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
        :root {
            --rosa-principal: #ff4da6;
            --rosa-escuro: #cc3d85;
        }

        body {
            background-color: #ffe6f2;
        }

        .card {
            border-radius: 12px;
            transition: 0.2s;
        }

        .card:hover {
            transform: scale(1.03);
            box-shadow: 0px 4px 15px rgba(255, 70, 160, 0.3);
        }

        .btn-rosa {
            background-color: var(--rosa-principal);
            border: none;
        }

        .btn-rosa:hover {
            background-color: var(--rosa-escuro);
        }

        .titulo {
            color: var(--rosa-escuro);
            font-weight: bold;
        }

        /* Ajustes especiais para telas pequenas */
        @media (max-width: 576px) {
            h1.titulo {
                font-size: 28px;
            }

            .card-body h5 {
                font-size: 18px;
            }

            .container {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <div class="container mt-4">

        <h1 class="text-center mb-4 titulo">Painel do Administrador</h1>

        <!-- Usamos row + col-sm-6 + col-md-4 = SUPER responsivo -->
        <div class="row g-4 justify-content-center">

            <!-- CRUD USUÁRIOS -->
            <div class="col-10 col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Usuários</h5>
                        <a href="usuario/lista_usuario.php" class="btn btn-rosa mt-2 w-100">Gerenciar Usuários</a>
                    </div>
                </div>
            </div>

            <!-- CRUD LIVROS -->
            <div class="col-10 col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Livros</h5>
                        <a href="livro/lista_livro.php" class="btn btn-rosa mt-2 w-100">Gerenciar Livros</a>
                    </div>
                </div>
            </div>

            <!-- CRUD CATEGORIAS -->
            <div class="col-10 col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Categorias</h5>
                        <a href="categoria/lista_categoria.php" class="btn btn-rosa mt-2 w-100">Gerenciar Categorias</a>
                    </div>
                </div>
            </div>

            <!-- CRUD DOWNLOADS -->
            <div class="col-10 col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Downloads</h5>
                        <a href="download/lista_download.php" class="btn btn-rosa mt-2 w-100">Gerenciar Downloads</a>
                    </div>
                </div>
            </div>

            <!-- CRUD TELEFONES -->
            <div class="col-10 col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Telefones</h5>
                        <a href="telefone/lista_telefone.php" class="btn btn-rosa mt-2 w-100">Gerenciar Telefones</a>
                    </div>
                </div>
            </div>

            <!-- LOGOUT -->
            <div class="col-10 col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Sair</h5>
                        <a href="../logout.php" class="btn btn-danger mt-2 w-100">Logout</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>
</html>
