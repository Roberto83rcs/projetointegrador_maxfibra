<?php
include("conexao.php");

// Consulta todas as faturas
$sql = "SELECT * FROM faturas";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Faturas</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Faturas</h1>

    <?php if (isset($_GET['msg'])): ?>
  <div class="mensagem">
    <?php
      if ($_GET['msg'] == 'paga') {
        echo "<p class='sucesso'>✅ Fatura paga com sucesso!</p>";
      } elseif ($_GET['msg'] == 'atrasada') {
        echo "<p class='erro'>⚠️ Fatura em atraso — regularize para evitar suspensão!</p>";
      } elseif ($_GET['msg'] == 'aberta') {
        echo "<p class='info'>🕒 Fatura está em aberto. Fique atento ao vencimento.</p>";
      }
    ?>
  </div>
<?php endif; ?>


    <table>
      <tr>
        <th>ID</th>
        <th>Valor</th>
        <th>Vencimento</th>
        <th>Status</th>
        <th>Ação</th>
      </tr>

      <?php while ($linha = $resultado->fetch_assoc()): ?>
        <tr>
          <form method="POST" action="atualizar_status.php">
            <td><?php echo $linha['id']; ?></td>
            <td>R$ <?php echo number_format($linha['valor'], 2, ',', '.'); ?></td>
            <td><?php echo date('d/m/Y', strtotime($linha['data_emissao'])); ?></td>
            <td>
              <select name="novo_status">
                <option value="paga" <?= $linha['status'] == 'paga' ? 'selected' : '' ?>>Pago</option>
                <option value="em_aberto" <?= $linha['status'] == 'em_aberto' ? 'selected' : '' ?>>Em Aberto</option>
                <option value="vencida" <?= $linha['status'] == 'vencida' ? 'selected' : '' ?>>Atraso</option>
              </select>
              <input type="hidden" name="fatura_id" value="<?= $linha['id'] ?>">
            </td>
            <td><button type="submit">Atualizar</button></td>
          </form>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
  <div style="text-align: center; margin-top: 20px;">
    <a href="index.php" class="botao-voltar">⮜ Voltar ao Menu</a>
</div>

</body>
</html>
