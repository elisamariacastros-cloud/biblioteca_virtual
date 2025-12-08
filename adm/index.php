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

        .secao-titulo {
            color: var(--rosa-escuro);
            font-weight: bold;
            margin-top: 40px;
            margin-bottom: 20px;
            text-align: center;
        }

        hr.divisor {
            border: 2px solid var(--rosa-principal);
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

<div class="container mt-4">

    <h1 class="titulo text-center mb-4">Painel do Administrador</h1>

    <!-- SEÇÃO CRUDs -->
    <h2 class="secao-titulo">CRUDs</h2>
    <hr class="divisor">

    <div class="row g-4 justify-content-center">

        <!-- CRUD USUÁRIOS -->
        <div class="col-10 col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Usuários</h5>
                    <a href="../usuario/lista_usuario.php" class="btn btn-rosa mt-2 w-100">Gerenciar Usuários</a>
                </div>
            </div>
        </div>

        <!-- CRUD LIVROS -->
        <div class="col-10 col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Livros</h5>
                    <a href="../livro/lista_livro.php" class="btn btn-rosa mt-2 w-100">Gerenciar Livros</a>
                </div>
            </div>
        </div>

        <!-- CRUD CATEGORIAS -->
        <div class="col-10 col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Categorias</h5>
                    <a href="../categoria/lista_categoria.php" class="btn btn-rosa mt-2 w-100">Gerenciar Categorias</a>
                </div>
            </div>
        </div>

        <!-- CRUD DOWNLOADS -->
        <div class="col-10 col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Downloads</h5>
                    <a href="../download/lista_download.php" class="btn btn-rosa mt-2 w-100">Gerenciar Downloads</a>
                </div>
            </div>
        </div>

        <!-- CRUD TELEFONES -->
        <div class="col-10 col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Telefones</h5>
                    <a href="../telefone/lista_telefone.php" class="btn btn-rosa mt-2 w-100">Gerenciar Telefones</a>
                </div>
            </div>
        </div>

    </div>

    <!-- SEÇÃO CONSULTAS -->
    <h2 class="secao-titulo">Consultas</h2>
    <hr class="divisor">

    <div class="row g-4 justify-content-center">

        <!-- Downloads por Livro -->
        <div class="col-10 col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Downloads por Livro</h5>
                    <a href="../consultas/downloads_por_livro.php" class="btn btn-rosa mt-2 w-100">Ver Consulta</a>
                </div>
            </div>
        </div>

        <!-- Livros por Categoria -->
        <div class="col-10 col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Livros por Categoria</h5>
                    <a href="../consultas/livro_por_categoria.php" class="btn btn-rosa mt-2 w-100">Ver Consulta</a>
                </div>
            </div>
        </div>

        <!-- Usuário com Mais Downloads -->
        <div class="col-10 col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Usuário com Mais Downloads</h5>
                    <a href="../consultas/usuario_mais_download.php" class="btn btn-rosa mt-2 w-100">Ver Consulta</a>
                </div>
            </div>
        </div>

        <!-- Usuários que Mais Baixam -->
        <div class="col-10 col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Usuários que Mais Baixam</h5>
                    <a href="../consultas/usuarios_mais_downloads.php" class="btn btn-rosa mt-2 w-100">Ver Consulta</a>
                </div>
            </div>
        </div>

        <!-- Livros Mais Baixados -->
        <div class="col-10 col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Livros Mais Baixados</h5>
                    <a href="../consultas/livro_mais_baixado.php" class="btn btn-rosa mt-2 w-100">Ver Consulta</a>
                </div>
            </div>
        </div>

        <!-- Livros Menos Baixados -->
        <div class="col-10 col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Livros Menos Baixados</h5>
                    <a href="../consultas/livro_menos_baixado.php" class="btn btn-rosa mt-2 w-100">Ver Consulta</a>
                </div>
            </div>
        </div>

        <!-- Dashboard -->
        <div class="col-10 col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Dashboard</h5>
                    <a href="../consultas/dashboard.php" class="btn btn-rosa mt-2 w-100">Ver Dashboard</a>
                </div>
            </div>
        </div>

    </div>

    <!-- SEÇÃO LOGOUT -->
    <h2 class="secao-titulo">Logout</h2>
    <hr class="divisor">

    <div class="row g-4 justify-content-center">
        <div class="col-10 col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Sair do Sistema</h5>
                    <a href="../usuario/login.php" class="btn btn-danger mt-2 w-100">Logout</a>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>
