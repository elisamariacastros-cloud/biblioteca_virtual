<?php 
session_start();
include "conexao.php";
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

            <!-- CARD 1 -->
            <div class="col-md-4">
                <div class="card p-2 shadow-sm">
                    <img src="https://conteudo.imguol.com.br/c/entretenimento/a4/2017/06/23/capa-do-livro-harry-potter-e-a-pedra-filosofal-1498234138852_v2_450x800.jpg" class="card-img-top" alt="Imagem do Livro">
                    <div class="card-body text-center">
                        <h5 class="card-title">Harry Potter e a Pedra Filosofal</h5>
                        <p class="card-text text-muted">"Harry Potter e a Pedra Filosofal" é o primeiro livro da saga e apresenta Harry, 
                            um garoto órfão que descobre que é um bruxo e é convidado para estudar em Hogwarts. Lá, ele faz amigos, 
                            aprende sobre o mundo mágico, e descobre que uma Pedra Filosofal, capaz de conceder imortalidade, 
                            está sendo ameaçada pelo Lord Voldemort, o mesmo bruxo que matou seus pais. 
                            A trama acompanha Harry e seus amigos na tentativa de proteger a pedra.  </p>
                        <a href="detalhes.php" class="btn btn-pink">Ver Detalhes</a>
                    </div>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="col-md-4">
                <div class="card p-2 shadow-sm">
                    <img src="https://m.media-amazon.com/images/I/81SVIwe5L9L._UF1000,1000_QL80_.jpg" class="card-img-top" alt="Imagem do Livro">
                    <div class="card-body text-center">
                        <h5 class="card-title">O Pequeno Principe</h5>
                        <p class="card-text text-muted">O Pequeno Príncipe" narra o encontro de um aviador, que caiu no deserto do Saara, 
                            com um menino de outro planeta, o asteroide B-612. O livro é uma alegoria sobre a amizade, o amor, a perda da 
                            inocência e as diferentes perspectivas da infância e da vida adulta, através das histórias contadas 
                            pelo príncipe sobre suas viagens por outros 
                            planetas e seus encontros com personagens que representam falhas humanas, como a ganância e a vaidade.</p>
                        <a href="detalhes.php" class="btn btn-pink">Ver Detalhes</a>
                    </div>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="col-md-4">
                <div class="card p-2 shadow-sm">
                    <img src="https://m.media-amazon.com/images/I/61es086Y4cL._AC_UF1000,1000_QL80_.jpg" class="card-img-top" alt="Imagem do Livro">
                    <div class="card-body text-center">
                        <h5 class="card-title">Os Três Porquinhos</h5>
                        <p class="card-text text-muted">"A fábula "Os Três Porquinhos" narra a história de três irmãos porquinhos que,
                             ao saírem para construir suas próprias vidas, se deparam com a ameaça de um lobo mau. Enquanto dois deles 
                             optam por construções rápidas e fáceis (palha e madeira), o terceiro, com mais preparo, constrói uma casa forte de tijolos.
                              A narrativa explora a inépcia e a preguiça de dois dos irmãos contra a prudência e o trabalho árduo do terceiro, 
                            que os salva de um final trágico ao conseguir deter o lobo e garantir a segurança de todos." 
                           </p>
                        <a href="detalhes.php" class="btn btn-pink">Ver Detalhes</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer>
        Biblioteca Virtual © 2025 – Desenvolvido por Elisa e Livya 💗
    </footer>

</body>
</html>
