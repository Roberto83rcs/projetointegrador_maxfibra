<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Contratação de Plano</title>
  <link rel="stylesheet" href="style.css">

</head>
<body>

<h2>Contratar um Plano</h2>

<form action="processa_contratacao.php" method="post">
  <label for="usuario_id">ID do Usuário:</label><br>
  <input type="number" id="usuario_id" name="usuario_id" required min="1"><br><br>

  <label for="plano_id">ID do Plano:</label><br>
  <input type="number" id="plano_id" name="plano_id" required min="1"><br><br>

  <input type="submit" value="Contratar">
</form>

</body>
</html>


