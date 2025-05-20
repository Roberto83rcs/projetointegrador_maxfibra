<?php
session_start();
include 'conexao.php';

$id = $_SESSION['usuario_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plano_id = $_POST['plano_id'];
    $obs = $_POST['observacao'];
    $sql = "INSERT INTO contratacoes (usuario_id, plano_id, observacao) VALUES ($id, $plano_id, '$obs')";
    $conn->query($sql);
    echo "<script>alert('Plano contratado com sucesso.'); location.href='dashboard.php';</script>";
}

$planos = $conn->query("SELECT * FROM planos");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contratar Plano</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Contratar Novo Plano</h2>
    <form method="post">
        <select name="plano_id" required>
            <option value="">Selecione um plano</option>
            <?php while($p = $planos->fetch_assoc()): ?>
                <option value="<?= $p['id'] ?>"><?= $p['nome'] ?> - <?= $p['velocidade'] ?> - R$ <?= $p['preco'] ?></option>
            <?php endwhile; ?>
        </select>
        <textarea name="observacao" placeholder="Observações (opcional)"></textarea>
        <button type="submit">Contratar</button>
    </form>
    <a href="dashboard.php">Voltar</a>
</div>
</body>
</html>
