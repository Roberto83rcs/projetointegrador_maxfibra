<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    $stmt = $conn->prepare("UPDATE usuarios SET nome = ?, email = ?, telefone = ? WHERE id = ?");
    $stmt->bind_param("sssi", $nome, $email, $telefone, $id);

    if ($stmt->execute()) {
        echo "<h2>Cadastro atualizado com sucesso!</h2>";
        echo "<p><strong>Nome:</strong> $nome</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Telefone:</strong> $telefone</p>";
        echo "<p>Cadastro atualizado com sucesso!</p>";
echo '<a href="alterar_cadastro.php">Alterar outro cadastro</a>';

    } else {
        echo "Erro ao atualizar cadastro.";
    }

    echo '<br><a href="alterar_cadastro.php">Voltar</a>';
} else {
    echo "Acesso inválido.";
}
?>
