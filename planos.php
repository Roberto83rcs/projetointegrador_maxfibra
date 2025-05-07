<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Planos - Max Fibra</title>
    <link rel="stylesheet" href="style.css">

    
</head>
<body>

<h1>Usuários e seus Planos</h1>

<?php
include 'conexao.php';

$sql = "SELECT u.nome AS nome_usuario, p.nome AS nome_plano, p.velocidade, p.preco
        FROM usuarios u
        LEFT JOIN planos p ON u.plano_id = p.id";

$result = $conn->query($sql);

if ($result->num_rows > 0):
?>

<table>
    <tr>
        <th>Nome do Usuário</th>
        <th>Nome do Plano</th>
        <th>Velocidade</th>
        <th>Preço</th>
    </tr>

    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['nome_usuario']) ?></td>
        <td><?= htmlspecialchars($row['nome_plano'] ?? 'Sem plano') ?></td>
        <td><?= htmlspecialchars($row['velocidade'] ?? '-') ?></td>
        <td>R$ <?= isset($row['preco']) ? number_format($row['preco'], 2, ',', '.') : '-' ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<?php else: ?>
    <p class="center">Nenhum usuário encontrado.</p>
<?php endif; ?>

<!-- Botão Voltar -->
<div class="center">
    <a href="index.php" class="botao-voltar">⮜ Voltar ao Menu</a>
</div>

</body>
</html>
