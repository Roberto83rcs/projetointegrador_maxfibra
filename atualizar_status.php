<?php
include("conexao.php");

if (isset($_POST['fatura_id']) && isset($_POST['novo_status'])) {
    $fatura_id = intval($_POST['fatura_id']);
    $novo_status = $_POST['novo_status'];

    // Verifica se o status é válido
    $status_validos = ['paga', 'em_aberto', 'vencida'];
    if (!in_array($novo_status, $status_validos)) {
        echo "Status inválido.";
        exit;
    }

    // Atualiza o status da fatura
    $sql = "UPDATE faturas SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $novo_status, $fatura_id);

    if ($stmt->execute()) {
        // Redireciona com a mensagem correspondente
        header("Location: faturas.php?msg=$novo_status");
        exit;
    } else {
        echo "Erro ao atualizar status.";
    }

    $stmt->close();
} else {
    echo "Parâmetros inválidos.";
}
?>
