<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    // Verifica se o usuário está ativo
    $verifica = $conn->prepare("SELECT * FROM usuarios WHERE id = ? AND ativo = 1");
    $verifica->bind_param("i", $id);
    $verifica->execute();
    $resultado = $verifica->get_result();

    if ($resultado->num_rows == 0) {
        echo "Usuário não encontrado ou inativo.";
        exit;
    }

    $stmt = $conn->prepare("UPDATE usuarios SET nome = ?, email = ?, telefone = ?, endereco = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $nome, $email, $telefone, $endereco, $id);

    if ($stmt->execute()) {
        echo "Cadastro atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o cadastro.";
    }

    echo "<br><a href='alterar_cadastro.php'>Voltar</a>";
}
?>
