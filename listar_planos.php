<?php
include 'conexao.php';

// Consulta todos os planos da tabela
$result = $conn->query("SELECT * FROM planos");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Lista de Planos</title>
    <link rel="stylesheet" href="style.css">  
</head>

<body>
    <h2>Planos Cadastrados</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Velocidade</th>
            <th>Preço</th>
            <th>Descrição</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= htmlspecialchars($row["id"]) ?></td>
            <td><?= htmlspecialchars($row["nome"]) ?></td>
            <td><?= htmlspecialchars($row["velocidade"]) ?></td>
            <td>R$ <?= number_format($row["preco"], 2, ',', '.') ?></td>
            <td><?= htmlspecialchars($row["descricao"]) ?></td>
        </tr>
        <?php } ?>
    </table>

    <a href="dashboard.php" class="botao-voltar">⮜ Voltar ao Dashboard</a>
</body>
</html>
