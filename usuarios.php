<?php
include 'conexao.php';

$sql = "SELECT id, nome, email FROM usuarios"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Usuários Cadastrados - Max Fibra</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Lista de Usuários</h2>

    <table border="1" style="margin: auto;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row["id"]) ?></td>
                <td><?= htmlspecialchars($row["nome"]) ?></td>
                <td><?= htmlspecialchars($row["email"]) ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div style="text-align: center; margin-top: 20px;">
        <a href="index.php" class="botao-voltar">⮜ Voltar ao Menu</a>
    </div>

</body>
</html>

<?php $conn->close(); ?>
