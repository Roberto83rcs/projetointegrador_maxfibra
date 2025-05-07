<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Plano</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h2>Cadastrar Novo Plano</h2>

    <form action="processa_plano.php" method="POST" autocomplete="off">
        <fieldset>
            <legend>Informações do Plano</legend>

            <label for="nome">Nome do Plano:</label><br>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="velocidade">Velocidade:</label><br>
            <input type="text" id="velocidade" name="velocidade" required><br><br>

            <label for="preco">Preço (R$):</label><br>
            <input type="number" id="preco" name="preco" step="0.01" required><br><br>

            <label for="descricao">Descrição:</label><br>
            <textarea id="descricao" name="descricao" rows="4" cols="50"></textarea><br><br>

            <input type="submit" value="Cadastrar Plano">
        </fieldset>
    </form>
</body>
</html>
