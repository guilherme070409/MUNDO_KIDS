<?php
session_start();
require_once '../model/pessoa.php';
require_once '../model/Usuarios.php';
require_once '../service/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_SESSION['email_recuperacao'] ?? null;
    $novaSenha = $_POST['nova_senha'] ?? '';
    $confirmarSenha = $_POST['confirmar_senha'] ?? '';

    if (!$email) {
        $_SESSION['msg'] = "Sessão expirada! Por favor, tente novamente.";
        header('Location: ../view/recuperar.php');
        exit();
    }

    if ($novaSenha !== $confirmarSenha) {
        $_SESSION['msg'] = "As senhas não estão iguais!";
        header('Location: ../view/nova_senha.php');
        exit();
    }

    if (usuario::alterarSenha($pdo, $email, $novaSenha)) {
        unset($_SESSION['email_recuperacao']);
        $_SESSION['msg'] = "Senha alterada com sucesso!";
        header('Location: ../view/login.php');
        exit();
    } else {
        $_SESSION['msg'] = "Erro ao alterar a senha. Tente novamente.";
        header('Location: ../view/nova_senha.php');
        exit();
    }
}
?>
