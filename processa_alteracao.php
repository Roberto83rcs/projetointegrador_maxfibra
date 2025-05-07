<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitiza os dados recebidos
    $id = intval($_POST["id"]);
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $telefone = trim($_POST["telefone"]);

    // Prepara a atualização
    $stmt = $conn->prepare("UPDATE usuarios SET nome = ?, email = ?, telefone = ? WHERE id = ?");
    $stmt->bind_param("sssi", $nome, $email, $telefone, $id);

    // Executa e mostra resultado
    if ($stmt->execute()) {
        echo "<h2>Cadastro atualizado com sucesso!</h2>";
        echo "<p><strong>Nome:</strong> " . htmlspecialchars($nome) . "</p>";
        echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
        echo "<p><strong>Telefone:</strong> " . htmlspecialchars($telefone) . "</p>";
        echo '<a href="alterar_cadastro.php">Alterar outro cadastro</a><br>';
        echo '<a href="index.php">⮜ Voltar ao Menu</a>';
    } else {
        echo "<p style='color: red;'>Erro ao atualizar cadastro: " . htmlspecialchars($stmt->error) . "</p>";
        echo '<a href="alterar_cadastro.php">Tentar novamente</a>';
    }

    $stmt->close();
    $conn->close();

} else {
    echo "<p>Acesso inválido.</p>";
    echo '<a href="index.php">⮜ Voltar ao Menu</a>';
}
?>
