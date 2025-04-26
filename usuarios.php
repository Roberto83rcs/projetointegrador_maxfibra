<?php
include 'conexao.php';

$sql = "SELECT id, nome, email FROM usuarios"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h2>Usuários Cadastrados</h2>
    <table border="1">
        <tr>
            <th>ID</th><th>Nome</th><th>Email</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["nome"] ?></td>
            <td><?= $row["email"] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <div style="text-align: center; margin-top: 20px;">
    <a href="index.php" class="botao-voltar">⮜ Voltar ao Menu</a>
</div>

</body>
</html>

<?php $conn->close(); ?>
