<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $id = $_POST["fatura_id"];
  $novo_status = $_POST["novo_status"];

  $sql = "UPDATE faturas SET status = ? WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("si", $novo_status, $id);
  $stmt->execute();

  // Define uma mensagem personalizada
  if ($novo_status == 'paga') {
    $mensagem = "paga";
  } elseif ($novo_status == 'vencida') {
    $mensagem = "atrasada";
  } else {
    $mensagem = "aberta";
  }

  // Redireciona com mensagem
  header("Location: faturas.php?msg=$mensagem");
  exit();
}
?>

