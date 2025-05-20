<?php
session_start();
include 'conexao.php';

$id = $_SESSION['usuario_id'];
$sql = "SELECT * FROM faturas WHERE usuario_id=$id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Faturas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Minhas Faturas</h2>
    <table>
        <tr>
            <th>Arquivo</th><th>Emissão</th><th>Vencimento</th><th>Valor</th><th>Status</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><a href="uploads/<?= $row['nome_arquivo'] ?>" download><?= $row['nome_arquivo'] ?></a></td>
            <td><?= $row['data_emissao'] ?></td>
            <td><?= $row['vencimento'] ?></td>
            <td>R$ <?= $row['valor'] ?></td>
            <td><?= $row['status'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="dashboard.php">Voltar</a>
</div>
</body>
</html>
