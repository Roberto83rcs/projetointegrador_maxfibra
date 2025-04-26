<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Cadastro</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h2>Alterar Cadastro</h2>
    <form action="processa_alteracao.php" method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone"><br><br>

        <input type="submit" value="Salvar Alterações">
    </form>
</body>
</html>
