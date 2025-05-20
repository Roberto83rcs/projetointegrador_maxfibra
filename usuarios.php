<?php
include 'conexao.php';

$resultado = $conn->query("SELECT * FROM usuarios WHERE ativo = 1");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Usuários Ativos</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Endereço</th>
        </tr>
        <?php while($usuario = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= $usuario['id'] ?></td>
            <td><?= $usuario['nome'] ?></td>
            <td><?= $usuario['email'] ?></td>
            <td><?= $usuario['telefone'] ?></td>
            <td><?= $usuario['endereco'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
