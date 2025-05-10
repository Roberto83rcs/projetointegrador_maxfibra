<?php
session_start();
require_once "conexao.php";

// Verifica se o funcionário está logado
if (!isset($_SESSION['funcionario_id'])) {
    header("Location: login.php");
    exit;
}

$erro = "";
$sucesso = "";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novaSenha = $_POST["nova_senha"];
    $confirmarSenha = $_POST["confirmar_senha"];

    // Valida se as senhas são iguais
    if ($novaSenha !== $confirmarSenha) {
        $erro = "As senhas não coincidem.";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/", $novaSenha)) {
        $erro = "A nova senha deve ter no mínimo 8 caracteres, incluindo: letra maiúscula, minúscula, número e caractere especial.";
    } else {
        $senha_hash = password_hash($novaSenha, PASSWORD_DEFAULT);
        $id = $_SESSION['funcionario_id'];

        $stmt = $conn->prepare("UPDATE funcionarios SET senha = ? WHERE id = ?");
        $stmt->bind_param("si", $senha_hash, $id);
        
        if ($stmt->execute()) {
            $sucesso = "Senha alterada com sucesso!";
            // Redireciona para dashboard após sucesso
            header("Location: dashboard.php");
            exit;
        } else {
            $erro = "Erro ao atualizar senha.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Trocar Senha - Max Fibra</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Trocar Senha</h2>

    <?php if ($erro): ?>
        <p style="color:red;"><?php echo $erro; ?></p>
    <?php endif; ?>

    <?php if ($sucesso): ?>
        <p style="color:green;"><?php echo $sucesso; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="nova_senha">Nova Senha:</label>
        <input type="password" name="nova_senha" required>

        <label for="confirmar_senha">Confirmar Nova Senha:</label>
        <input type="password" name="confirmar_senha" required>

        <input type="submit" value="Alterar Senha">
    </form>
</body>
</html>
