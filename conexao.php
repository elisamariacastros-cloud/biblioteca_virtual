<?php
$servidor = "localhost:3306";   // normalmente é localhost
$usuario  = "root";        // seu usuário do MySQL
$senha    = "@Elisa0204";            // senha do MySQL (às vezes é vazia)
$banco    = "biblioteca"; // coloque o nome do seu banco aqui

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se deu certo
 if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
    }
    echo "Conectado!"; //debug

?>