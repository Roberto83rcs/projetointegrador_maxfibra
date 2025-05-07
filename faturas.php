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

    <?php
    if (isset($_GET['msg'])) {
      echo '<div class="mensagem">';
      switch ($_GET['msg']) {
        case 'paga':
          echo "<p class='sucesso'>✅ Fatura paga com sucesso!</p>";
          break;
        case 'vencida':
          echo "<p class='erro'>⚠️ Fatura em atraso — regularize para evitar suspensão!</p>";
          break;
        case 'em_aberto':
          echo "<p class='info'>🕒 Fatura está em aberto. Fique atento ao vencimento.</p>";
          break;
      }
      echo '</div>';
    }
    ?>

    <table>
      <tr>
        <th>ID</th>
        <th>Valor</th>
        <th>Vencimento</th>
        <th>Status</th>
        <th>Ação</th>
      </tr>

      <?php while ($linha = $resultado->fetch_assoc()): ?>
        <form method="POST" action="atualizar_status.php">
          <tr>
            <td><?php echo $linha['id']; ?></td>
            <td>R$ <?php echo number_format($linha['valor'], 2, ',', '.'); ?></td>
            <td><?php echo date('d/m/Y', strtotime($linha['data_emissao'])); ?></td> <!-- Troque por 'data_vencimento' se houver -->
            <td>
              <select name="novo_status">
                <option value="paga" <?= $linha['status'] == 'paga' ? 'selected' : '' ?>>Pago</option>
                <option value="em_aberto" <?= $linha['status'] == 'em_aberto' ? 'selected' : '' ?>>Em Aberto</option>
                <option value="vencida" <?= $linha['status'] == 'vencida' ? 'selected' : '' ?>>Atraso</option>
              </select>
              <input type="hidden" name="fatura_id" value="<?= $linha['id'] ?>">
            </td>
            <td><button type="submit">Atualizar</button></td>
          </tr>
        </form>
      <?php endwhile; ?>
    </table>

    <div style="text-align: center;">
      <a href="index.php" class="botao-voltar">⮜ Voltar ao Menu</a>
    </div>
  </div>
</body>
</html>

              