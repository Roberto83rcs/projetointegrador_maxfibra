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
        <h2>Login do Funcionário</h2>

        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>

        <input type="submit" value="Entrar">
    </form>

</body>
</html>
