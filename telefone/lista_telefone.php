<?php
include '../conexao.php';

$sql = "SELECT telefone.*, usuario.nome 
        FROM telefone 
        JOIN usuario ON telefone.usuario_id = usuario.id
        ORDER BY usuario.nome ASC";

$result = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Telefones — Biblioteca Virtual</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background:#ffe6f2; }
        .titulo {
            text-align:center;
            margin:25px;
            font-weight:700;
            font-size:28px;
            color:#d63384;
        }
        .btn-pink { background:#d63384;color:white; }
        .btn-pink:hover { background:#b0266a; }
    </style>
</head>

<body>

<h1 class="titulo">📞 Telefones Cadastrados</h1>

<div class="container">

    <a href="cria_telefone.php" class="btn btn-pink mb-3">Adicionar Telefone</a>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>DDD</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
        <?php while($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nome'] ?></td>
                <td><?= $row['DDD'] ?></td>
                <td><?= $row['telefone'] ?></td>
                <td>
                    <a href="edita_telefone.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="excluir_telefone.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
