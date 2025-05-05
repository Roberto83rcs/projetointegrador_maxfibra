<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Max Fibra</title>
    <link rel="stylesheet" href="style.css">
    <img src="assets/logotipo.jpg" alt="Max Fibra Logo" class="logo">

</head>
<body>
<form action="valida_login.php" method="POST">
<h2>Login do Funcionário</h2>
    <label>Usuário:</label>
    <input type="text" name="usuario" required><br>

    <label>Senha:</label>
    <input type="password" name="senha" required><br>

    <input type="submit" value="Entrar">
</form>

    
</body>
</html>
