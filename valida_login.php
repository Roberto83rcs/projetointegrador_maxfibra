<?php
session_start();
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Prepara a consulta
    $stmt = $conn->prepare("SELECT * FROM funcionarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $funcionario = $resultado->fetch_assoc();

        // Verifica se a senha está correta
        if (password_verify($senha, $funcionario['senha'])) {
            $_SESSION['usuario'] = $usuario;
            header("Location: index.php");
            exit;
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $stmt->close();
} else {
    echo "Requisição inválida.";
}
?>
