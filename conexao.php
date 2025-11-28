<?php
$servidor = "localhost:3306";  
$usuario  = "root";        
$senha    = "@Elisa0204";            
$banco    = "biblioteca"; 

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se deu certo
 if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
    }
    echo "Conectado!"; //debug

?>