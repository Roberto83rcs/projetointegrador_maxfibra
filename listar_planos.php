<?php
include 'conexao.php';

$result = $conn->query("SELECT * FROM planos");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Planos</title>
</head>
<body>
    <h2>Planos Cadastrados</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Velocidade</th>
            <th>Preço</th>
            <th>Descrição</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["nome"] ?></td>
            <td><?= $row["velocidade"] ?></td>
            <td>R$ <?= number_format($row["preco"], 2, ',', '.') ?></td>
            <td><?= $row["descricao"] ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
