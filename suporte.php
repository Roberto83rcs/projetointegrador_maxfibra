<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Solicitar Suporte - Max Fibra</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Solicitação de Suporte</h2>

    <form action="processa_suporte.php" method="POST" style="max-width: 500px; margin: auto;">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="descricao">Descrição do Problema:</label><br>
        <textarea id="descricao" name="descricao" rows="5" required></textarea><br><br>

        <input type="submit" value="Enviar">
    </form>

    <div style="text-align: center; margin-top: 20px;">
        <a href="index.php" class="botao-voltar">⮜ Voltar ao Menu</a>
    </div>

</body>
</html>
