<?php
session_start();
$erro = $_GET['erro'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Max Fibra</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <img src="assets/logotipo.jpg" alt="Max Fibra Logo" class="logo">

    <form action="valida_login.php" method="POST">
        <h2>Login - Max Fibra</h2>

        <input type="text" name="usuario" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <input type="submit" value="Entrar">

        <?php if ($erro): ?>
            <p class="erro"><?php echo htmlspecialchars($erro); ?></p>
        <?php endif; ?>
    </form>

</body>
</html>
