<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title> MundoKids - Login</title>
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Cpolygon points='32,4 39,24 60,24 42,38 48,58 32,46 16,58 22,38 4,24 25,24' fill='%23FFD700' stroke='%23000' stroke-width='2'/%3E%3C/svg%3E">
  <link rel="stylesheet" href="style.css">
  <script src="script.js" defer></script>
</head>

<body class="login-page">
  <div class="container">
    <h2>Entrar no Mundo Kids</h2>

    <form action="../controller/Login.php" method="POST">
      <div class="input-group">
        <input type="text" name="username" placeholder="Email ou usuario  " required>
      </div>
      <div class="input-group">
        <input type="password" name="password" placeholder="Senha" required>
      </div>
      <button type="submit">Entrar</button>
      <div class="form-links">
        <a href="recuperar.php">Esqueceu a senha?</a>
        <a href="registro.php">Registrar-se</a>
      </div>
    </form>

    <?php if (!empty($_SESSION['erro'])): ?>
      <p class="erromsg"><?= $_SESSION['erro']; unset($_SESSION['erro']); ?></p>
    <?php endif; ?>

    <?php if (!empty($_SESSION['msg'])): ?>
      <p class="acertomsg"><?= $_SESSION['msg']; unset($_SESSION['msg']); ?></p>
    <?php endif; ?>
  </div>

</body>

</html>
