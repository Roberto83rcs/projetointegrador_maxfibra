<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel do Funcionário – Max Fibra</title>
  <link rel="stylesheet" href="css/style.css">
  
</head>
<body>
  <header class="header">
    <img src="assets/logo.png" alt="Max Fibra Logo" class="logo">
    <h1>Max Fibra</h1>
  </header>

  <section class="welcome">
    <p>Bem‑vindo, <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong>!</p>
  </section>

  <nav class="menu">
    <a href="usuarios.php" class="menu-item">Usuários</a>
    <a href="faturas.php" class="menu-item">Faturas</a>
    <a href="planos.php" class="menu-item">Planos</a>
    <a href="suporte.php" class="menu-item">Suporte</a>
    <a href="alterar_cadastro.php" class="menu-item">Alterar Cadastro</a>
    <a href="logout.php" class="menu-item logout">Sair</a>
  </nav>
</body>
</html>
