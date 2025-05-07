<?php
session_start();
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $usuario = trim($_POST['usuario']);
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT * FROM funcionarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $funcionario = $resultado->fetch_assoc();

        if (password_verify($senha, $funcionario['senha'])) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['id'] = $funcionario['id']; // opcional: guardar ID também
            header("Location: index.php");
            exit;
        } else {
            echo "<p>❌ Senha incorreta.</p>";
        }
    } else {
        echo "<p>❌ Usuário não encontrado.</p>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<p>❌ Requisição inválida.</p>";
}
?>
