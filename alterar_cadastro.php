<?php
include 'conexao.php';

$usuario = null;
$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buscar'])) {
    $id = $_POST['id'];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
    } else {
        $erro = "Usuário não encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Cadastro</title>
</head>
<body>

<h2>Alterar Cadastro</h2>

<?php if (!isset($usuario)) : ?>
    <form method="POST" action="">
        <label>ID do Usuário:</label><br>
        <input type="number" name="id" required><br><br>
        <input type="submit" name="buscar" value="Buscar">
    </form>
    <?php if ($erro) echo "<p style='color:red;'>$erro</p>"; ?>
<?php else: ?>
    <form action="processa_alteracao.php" method="POST">
        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $usuario['email'] ?>" required><br><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone" value="<?= $usuario['telefone'] ?>"><br><br>

        <input type="submit" value="Salvar Alterações">
    </form>
<?php endif; ?>

</body>
</html>
