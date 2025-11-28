<?php
$servidor = "localhost:3307";   // normalmente é localhost
$usuario  = "root";        // seu usuário do MySQL
$senha    = "L0i4v0y7a08@";            // senha do MySQL (às vezes é vazia)
$banco    = "biblioteca"; 

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se deu certo
 if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
    }
    echo "Conectado!"; //debug

?>