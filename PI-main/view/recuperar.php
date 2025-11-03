<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>MundoKids - Recuperar Senha</title>
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Cpolygon points='32,4 39,24 60,24 42,38 48,58 32,46 16,58 22,38 4,24 25,24' fill='%23FFD700' stroke='%23000' stroke-width='2'/%3E%3C/svg%3E">
  <link rel="stylesheet" href="style.css" />
</head>
<body>

  <a href="login.php" class="btn-voltar" title="Voltar ao Login"></a>

  <div class="container">
    <h2>Esqueceu sua senha?</h2>
    <form action="../controller/RecuperarSenha.php" method="POST">
      <div class="input-group">
        <label for="email">Digite seu e-mail</label>
        <input type="email" name="email" id="email" required />
      </div>

      <button type="submit">Enviar Código</button>

      <div class="link-group" style="margin-top:15px;">
        <a href="login.php" class="magic-link"> Voltar ao Login</a>
      </div>
    </form>

    <?php if (!empty($_SESSION['msg'])): ?>
      <p class="message"><?= htmlspecialchars($_SESSION['msg']); unset($_SESSION['msg']); ?></p>
    <?php endif; ?>
  </div>

</body>
</html>
