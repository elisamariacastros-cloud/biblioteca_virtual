<?php
session_start();
include "../conexao.php";

// Pega ID vindo da URL
$id = $_GET["id"] ?? 0;

// consulta no banco
$sql = "SELECT * FROM livros WHERE idLivros = $id";
$result = mysqli_query($conexao, $sql);

// Se não encontrou nenhum livro, mostra erro
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $livro['Titulo']; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #ffe6f2; }
        .container { margin-top: 40px; }

        .card {
            padding: 25px;
            border-radius: 15px;
            background: white;
            box-shadow: 0 4px 15px rgba(255, 20, 147, 0.2);
        }

        .btn-voltar {
            background-color: #d63384;
            color: white;
            border-radius: 8px;
        }

        .btn-voltar:hover {
            background-color: #b0266a;
            color: white;
        }

        h1 {
            color: #d63384;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="card">
        <h1 class="text-center"><?php echo $livro['Titulo']; ?></h1>
        <hr>

        <p><strong>Autor:</strong> <?php echo $livro['Autor']; ?></p>
        <p><strong>Ano de Publicação:</strong> <?php echo $livro['Ano_publicacao']; ?></p>
        <p><strong>Editora:</strong> <?php echo $livro['Editora']; ?></p>
        <p><strong>Número de Páginas:</strong> <?php echo $livro['NumeroPaginas']; ?></p>
        <p><strong>Indicação de Idade:</strong> <?php echo $livro['Indicacao_idade']; ?></p>
        <p><strong>Status do Livro:</strong> <?php echo $livro['Status_Livro']; ?></p>
        <p><strong>Código de Identificação:</strong> <?php echo $livro['Codigo_identificacao']; ?></p>

        <p><strong>Descrição:</strong><br>
            <?php echo nl2br($livro['Descricao']); ?>
        </p>
         <!-- Botão de baixar o PDF -->
   <a href="#" onclick="alert('Download simulado para o trabalho 😊');" 
   class="btn btn-pink w-100 mt-3">
    Baixar PDF
</a>
        <a href="livros.php" class="btn btn-voltar mt-3">⬅ Voltar</a>

    </div>

</div>

</body>
</html>
