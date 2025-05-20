<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitiza e valida os dados
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $descricao = trim($_POST["descricao"]);

    if (!empty($nome) && !empty($email) && !empty($descricao)) {
        $sql = "INSERT INTO suporte (nome, email, mensagem) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $descricao);

        if ($stmt->execute()) {
            echo "<h2 style='color: green;'>Solicitação de suporte enviada com sucesso!</h2>";
            echo "<p><strong>Nome:</strong> " . htmlspecialchars($nome) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
            echo "<p><strong>Mensagem:</strong> " . nl2br(htmlspecialchars($descricao)) . "</p>";
            echo '<p><a href="suporte.php">⮜ Enviar nova solicitação</a></p>';
        } else {
            echo "<p style='color:red;'>Erro ao enviar a solicitação: " . htmlspecialchars($stmt->error) . "</p>";
            echo '<p><a href="suporte.php">⮜ Voltar</a></p>';
        }

        $stmt->close();
    } else {
        echo "<p style='color:red;'>Todos os campos são obrigatórios.</p>";
        echo '<p><a href="suporte.php">⮜ Voltar</a></p>';
    }

    $conn->close();
} else {
    echo "<p style='color:red;'>Acesso inválido.</p>";
    echo '<p><a href="suporte.php">⮜ Voltar</a></p>';
}
?>
