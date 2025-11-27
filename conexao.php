<?php
$servidor = "localhost";   // normalmente é localhost
$usuario  = "root";        // seu usuário do MySQL
$senha    = "@Elisa0204";            // senha do MySQL (às vezes é vazia)
$banco    = "biblioteca"; // coloque o nome do seu banco aqui

$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se deu certo
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>