<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Solicitar Suporte</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h2>Suporte</h2>
    <form action="processa_suporte.php" method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br>

        <label>Descrição do Problema:</label><br>
        <textarea name="descricao" rows="4" required></textarea><br><br>

        <input type="submit" value="Enviar">
    </form>
    <div style="text-align: center; margin-top: 20px;">
    <a href="index.php" class="botao-voltar">⮜ Voltar ao Menu</a>
</div>

</body>
</html>
