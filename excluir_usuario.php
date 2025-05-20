<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario_id'])) {
    $usuario_id = $_POST['usuario_id'];

    // Verifica se há faturas ativas para esse usuário
    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM faturas WHERE usuario_id = ?");
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $resultado = $stmt->get_result()->fetch_assoc();

    if ($resultado['total'] > 0) {
        echo "<p>Não é possível excluir o cadastro. Existem faturas vinculadas a este usuário.</p>";
        echo "<a href='alterar_cadastro.php'>Voltar</a>";
        exit;
    }

    // Realiza exclusão lógica (define ativo = 0)
    $stmt = $conn->prepare("UPDATE usuarios SET ativo = 0 WHERE id = ?");
    $stmt->bind_param("i", $usuario_id);
    if ($stmt->execute()) {
        echo "<p>Cadastro desativado com sucesso!</p>";
    } else {
        echo "<p>Erro ao desativar o cadastro.</p>";
    }
    echo "<a href='alterar_cadastro.php'>Voltar</a>";
}
?>
