<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Trocar Senha</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form action="processa_troca_senha.php" method="POST">
        <h2>Trocar Senha</h2>
        <input type="password" name="nova_senha" placeholder="Nova Senha" required>
        <input type="submit" value="Alterar Senha">
    </form>

</body>
</html>
