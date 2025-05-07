<?php
include 'conexao.php';

$usuario = 'admin';
$senha = password_hash('1234', PASSWORD_DEFAULT); // senha protegida com hash

// Verifica se o usuário já existe (opcional, recomendado)
$check = $conn->prepare("SELECT id FROM funcionarios WHERE usuario = ?");
$check->bind_param("s", $usuario);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo "Usuário já cadastrado!";
} else {
    // Prepara o INSERT
    $stmt = $conn->prepare("INSERT INTO funcionarios (usuario, senha) VALUES (?, ?)");

    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    $stmt->bind_param("ss", $usuario, $senha);

    if ($stmt->execute()) {
        echo "Funcionário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar funcionário: " . $stmt->error;
    }
}

$check->close();
$stmt->close();
$conn->close();
?>
