<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitiza e valida os dados recebidos
    $nome = trim($_POST["nome"]);
    $velocidade = trim($_POST["velocidade"]);
    $preco = floatval($_POST["preco"]);
    $descricao = trim($_POST["descricao"]);

    if ($nome && $velocidade && $preco > 0) {
        $stmt = $conn->prepare("INSERT INTO planos (nome, velocidade, preco, descricao) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssds", $nome, $velocidade, $preco, $descricao);

        if ($stmt->execute()) {
            echo "<h2 style='color: green;'>Plano cadastrado com sucesso!</h2>";
            echo "<p><a href='cadastrar_plano.php'>Cadastrar outro plano</a></p>";
            echo "<p><a href='listar_planos.php'>Ver todos os planos</a></p>";
        } else {
            echo "<p style='color: red;'>Erro ao cadastrar plano: " . htmlspecialchars($stmt->error) . "</p>";
            echo "<a href='cadastrar_plano.php'>⮜ Voltar</a>";
        }

        $stmt->close();
    } else {
        echo "<p style='color: red;'>Por favor, preencha todos os campos obrigatórios corretamente.</p>";
        echo "<a href='cadastrar_plano.php'>⮜ Voltar</a>";
    }

    $conn->close();
} else {
    echo "<p style='color: red;'>Acesso inválido.</p>";
    echo "<a href='cadastrar_plano.php'>⮜ Voltar</a>";
}
?>
