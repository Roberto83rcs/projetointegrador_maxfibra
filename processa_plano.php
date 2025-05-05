<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $velocidade = $_POST["velocidade"];
    $preco = $_POST["preco"];
    $descricao = $_POST["descricao"];

    $stmt = $conn->prepare("INSERT INTO planos (nome, velocidade, preco, descricao) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $nome, $velocidade, $preco, $descricao);

    if ($stmt->execute()) {
        echo "Plano cadastrado com sucesso!<br>";
        echo '<a href="cadastrar_plano.php">Cadastrar outro</a><br>';
        echo '<a href="listar_planos.php">Ver todos os planos</a>';
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
