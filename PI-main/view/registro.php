<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>MundoKids - Registro</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Cpolygon points='32,4 39,24 60,24 42,38 48,58 32,46 16,58 22,38 4,24 25,24' fill='%23FFD700' stroke='%23000' stroke-width='2'/%3E%3C/svg%3E">
  <script>
    function validarSenhas() {
      const senha = document.getElementById("senha").value;
      const confirmar = document.getElementById("confirmarSenha").value;
      if (senha !== confirmar) {
        alert("As senhas não coincidem!");
        return false;
      }
      return true;
    }
  </script>
</head>
<body>

  <a href="login.php" class="btn-voltar" title="Voltar ao Login"></a>

  <div class="container">
    <h2>Registrar-se no Mundo Kids</h2>
    <form action="../controller/Registro.php" method="POST" onsubmit="return validarSenhas()">

      <div>
        <label>Foto de perfil:</label>
        <div>
          <button type="button" id="abrirGaleria">Escolher foto de perfil</button>
          <input type="hidden" name="avatar" id="avatarSelecionado" required>
          <div id="previewAvatar" style="margin-top:10px;"></div>
        </div>

        <div id="galeria" class="galeria" style="display:none;">
          <?php
          $files = glob("img/*.{png,jpg,jpeg}", GLOB_BRACE);
          foreach ($files as $file) {
              echo "<img src='$file' class='avatar-img'>";
          }
          ?>
        </div>
      </div>

      <div class="input-group">
        <label for="fullName">Nome completo</label>
        <input type="text" name="fullName" id="fullName" required />
      </div>
      
      <div class="input-group">
        <label for="userName">Nome de usuario</label>
        <input type="text" name="userName" id="userName" required />
      </div>

      <div class="input-row">
        <div class="input-group">
          <label for="fatherName">Nome do Pai</label>
          <input type="text" name="fatherName" id="fatherName" required />
        </div>
        <div class="input-group">
          <label for="motherName">Nome da Mãe</label>
          <input type="text" name="motherName" id="motherName" required />
        </div>
      </div>

      <div class="input-row">
        <div class="input-group">
          <label for="yourEmail">Email</label>
          <input type="email" name="yourEmail" id="yourEmail" required />
        </div>
        <div class="input-group">
          <label for="telefone">Telefone</label>
          <input type="tel" name="telefone" id="telefone" pattern="\(\d{2}\) \d{4,5}-\d{4}" placeholder="(99) 99999-9999" required />
        </div>
      </div>
      
      <div class="input-group">
        <label for="data_nascimento">Data de nascimento</label>
        <input type="date" name="data_nascimento" id="data_nascimento" required />
      </div>

      <div class="input-row">
        <div class="input-group">
          <label for="senha">Senha</label>
          <input type="password" name="password" id="senha" pattern=".{8,}" title="A senha deve ter no mínimo 8 caracteres" required placeholder="mínimo 8 caracteres" />
        </div>
        <div class="input-group">
          <label for="confirmarSenha">Confirmar Senha</label>
          <input type="password" name="confirmPassword" id="confirmarSenha" required />
        </div>
      </div>

      <button type="submit">Registrar</button>

      <div class="link-group" style="margin-top:15px;">
        <a href="login.php" class="magic-link"> Já tem conta? Login</a>
      </div>
    </form>

    <?php if (!empty($_SESSION['msg'])): ?>
      <p class="message success"><?= $_SESSION['msg']; unset($_SESSION['msg']); ?></p>
    <?php endif; ?>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const botaoGaleria = document.getElementById('abrirGaleria');
      const galeria = document.getElementById('galeria');
      const avatarInput = document.getElementById('avatarSelecionado');
      const preview = document.getElementById('previewAvatar');

      // Abrir/fechar galeria
      botaoGaleria.addEventListener('click', () => {
        galeria.style.display = galeria.style.display === 'flex' ? 'none' : 'flex';
      });

      // Selecionar avatar
      const avatares = document.querySelectorAll('.avatar-img');
      avatares.forEach(avatar => {
        avatar.addEventListener('click', () => {
          // Remove a seleção de todos
          avatares.forEach(a => a.classList.remove('selecionado'));
          // Marca o selecionado
          avatar.classList.add('selecionado');
          // Coloca o valor no input hidden (apenas o nome do arquivo)
          const fileName = avatar.src.split('/').pop();
          avatarInput.value = fileName;
          // Mostra o preview
          preview.innerHTML = `<img src="${avatar.src}" style="width:100px;height:100px;border-radius:50%;border:3px solid #007bff;">`;
          // Fecha a galeria
          galeria.style.display = 'none';
        });
      });

      // Máscaras para telefone
      function maskTelefone(value) {
        value = value.replace(/\D/g, "");
        value = value.replace(/^(\d{2})(\d)/g, "($1) $2");
        value = value.replace(/(\d{5})(\d)/, "$1-$2");
        value = value.substring(0, 15);
        return value;
      }

      const tel = document.getElementById('telefone');
      if (tel) {
        tel.addEventListener('input', function(e) {
          e.target.value = maskTelefone(e.target.value);
        });
      }
    });
  </script>
</body>
</html>