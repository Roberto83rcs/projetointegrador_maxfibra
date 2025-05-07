<<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["fatura_id"];
    $novo_status = $_POST["novo_status"];

    // Validação básica
    $validos = ["aberta", "paga", "vencida"];
    if (!in_array($novo_status, $validos) || !is_numeric($id)) {
        die("Parâmetros inválidos.");
    }

    $sql = "UPDATE faturas SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $novo_status, $id);
    $stmt->execute();

    // Mensagem para redirecionamento
    $mensagens = [
        'paga' => 'paga',
        'vencida' => 'atrasada',
        'aberta' => 'aberta'
    ];
    $mensagem = $mensagens[$novo_status] ?? 'aberta';

    header("Location: faturas.php?msg=" . urlencode($mensagem));
    exit();
}
?>
