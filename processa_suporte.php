<?php
include 'conexao.php'; // 

$nome = $_POST["nome"];
$email = $_POST["email"];
$descricao = $_POST["descricao"];

$sql = "INSERT INTO suporte (nome, email, mensagem) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nome, $email, $descricao);

if ($stmt->execute()) {
    echo "Solicitação de suporte enviada com sucesso!";
} else {
    echo "Erro ao enviar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
