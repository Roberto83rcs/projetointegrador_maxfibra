<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Plano</title>
</head>
<body>
    <h2>Cadastrar Novo Plano</h2>
    <form action="processa_plano.php" method="POST">
        <label>Nome do Plano:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>Velocidade:</label><br>
        <input type="text" name="velocidade" required><br><br>

        <label>Preço (R$):</label><br>
        <input type="text" name="preco" required><br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao"></textarea><br><br>

        <input type="submit" value="Cadastrar Plano">
    </form>
</body>
</html>
