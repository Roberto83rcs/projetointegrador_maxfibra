<?php
session_start();
include("conexao.php");

$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';

// Buscar o usuário ativo
$sql = "SELECT * FROM usuarios WHERE email = ? AND ativo = 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $dados = $result->fetch_assoc();

    if (password_verify($senha, $dados['senha'])) {
        $_SESSION['usuario_id'] = $dados['id'];
        $_SESSION['email'] = $dados['email'];

        // Se a senha for "1234", força troca
        if ($senha === "1234") {
            header("Location: trocar_senha.php");
            exit;
        }

        header("Location: painel.php");
        exit;
    }
}

// Redireciona com erro
header("Location: login.php?erro=Email ou senha inválidos!");
exit;
