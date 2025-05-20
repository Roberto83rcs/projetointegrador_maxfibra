<?php
session_start();
include 'conexao.php';

$id = $_SESSION['usuario_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    $sql = "INSERT INTO suporte (usuario_id, nome, email, mensagem) VALUES ($id, '$nome', '$email', '$mensagem')";
    $conn->query($sql);
    echo "<script>alert('Solicitação enviada com sucesso.'); location.href='dashboard.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Suporte</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Solicitar Suporte</h2>
    <form method="post">
        <input type="text" name="nome" placeholder="Seu nome" required>
        <input type="email" name="email" placeholder="Seu email" required>
        <textarea name="mensagem" placeholder="Descreva o problema..." required></textarea>
        <button type="submit">Enviar</button>
    </form>
    <a href="dashboard.php">Voltar</a>
</div>
</body>
</html>
