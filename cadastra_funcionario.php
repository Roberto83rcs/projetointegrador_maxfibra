<?php
include 'conexao.php';

$usuario = 'admin';
$senha = password_hash('1234', PASSWORD_DEFAULT); // senha protegida com hash

$stmt = $conn->prepare("INSERT INTO funcionarios (usuario, senha) VALUES (?, ?)");
$stmt->bind_param("ss", $usuario, $senha);
$stmt->execute();
echo "Funcionário cadastrado com sucesso!";
?>

