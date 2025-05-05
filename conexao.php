<?php
// Configurações de conexão com o banco de dados
$host = "localhost"; 
$usuario = "root";
$senha = "";
$banco = "projetointegrador_maxfibra";

// Criar conexão
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
