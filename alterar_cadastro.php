<?php
session_start();
include 'conexao.php';

$id = $_SESSION['usuario_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $sql = "UPDATE usuarios SET nome='$nome', telefone='$telefone', endereco='$endereco' WHERE id=$id";
    $conn->query($sql);
    header("Location: dashboard.php");
    exit();
}

$sql = "SELECT * FROM usuarios WHERE id=$id";
$result = $conn->query($sql);
$usuario = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Alterar Cadastro</h2>
        <form method="post">
            <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required>
            <input type="text" name="telefone" value="<?= $usuario['telefone'] ?>" required>
            <input type="text" name="endereco" value="<?= $usuario['endereco'] ?>" required>
            <button type="submit">Salvar</button>
        </form>
        <a href="dashboard.php">Voltar</a>
    </div>
</body>
</html>
