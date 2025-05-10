<?php
session_start();
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT id, usuario, senha FROM funcionarios WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $dados = $resultado->fetch_assoc();

        if (password_verify($senha, $dados['senha'])) {
            $_SESSION['usuario'] = $dados['usuario'];
            $_SESSION['funcionario_id'] = $dados['id'];

            // Se for a senha padrão, redireciona para troca
            if ($senha === '1234') {
                header("Location: troca_senha.php");
                exit;
            }

            header("Location: index.php");
            exit;
        } else {
            echo "❌ Senha incorreta.";
        }
    } else {
        echo "❌ Funcionário não encontrado.";
    }

    $stmt->close();
} else {
    echo "Requisição inválida.";
}
?>
