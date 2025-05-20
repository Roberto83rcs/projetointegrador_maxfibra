<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Área do Cliente</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Bem-vindo à Área do Cliente</h2>
        <a href="alterar_cadastro.php">Alterar Cadastro</a>
        <a href="faturas.php">Faturas</a>
        <a href="suporte.php">Solicitar Suporte</a>
        <a href="contratacoes.php">Contratar Plano</a>
        <a href="logout.php">Sair</a>
    </div>
</body>
</html>
