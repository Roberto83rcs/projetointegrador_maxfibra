<?php
include 'conexao.php';

// Dados do funcionário
$usuario = 'admin'; // ou outro nome de login
$senha_plana = '1234'; // senha padrão

// Criptografar a senha
$senha_hash = password_hash($senha_plana, PASSWORD_DEFAULT);

// Preparar e executar a inserção
$sql = "INSERT INTO funcionarios (usuario, senha) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $usuario, $senha_hash);

if ($stmt->execute()) {
    echo "✅ Funcionário inserido com sucesso!";
} else {
    echo "❌ Erro ao inserir: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
