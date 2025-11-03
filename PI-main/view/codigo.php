<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>MundoKids - Verificar Código</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Cpolygon points='32,4 39,24 60,24 42,38 48,58 32,46 16,58 22,38 4,24 25,24' fill='%23FFD700' stroke='%23000' stroke-width='2'/%3E%3C/svg%3E">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <a href="recuperar.php" class="btn-voltar" title="Voltar"></a>

    <div class="container mt-5">
        <div class="form-box active" id="login-form">
            <form action="../controller/VerificarCodigo.php" method="POST">
                <div class="input-group">
                  <label for="codigo">Digite o código recebido</label>
                  <input type="text" name="codigo" id="codigo" placeholder="Código recebido" required />
                </div>
                <button type="submit">Verificar Código</button>
            </form>

            <?php if (!empty($_SESSION['erro'])): ?>

                <p class="erromsg"><?= $_SESSION['erro'];
                                    unset($_SESSION['erro']); ?></p>
            <?php endif; ?>
            <?php if (!empty($_SESSION['msg'])): ?>

                <p class="acertomsg"><?= $_SESSION['msg'];
                                    unset($_SESSION['msg']); ?></p>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>
