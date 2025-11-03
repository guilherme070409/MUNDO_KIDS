<?php
session_start();

require_once '../model/codigo.php';
require_once '../service/conexao.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_SESSION['email_recuperacao'] ?? null;


    $codigo = $_POST['codigo'] ?? '';


    if ($email && Codigo::verificarCodigo($pdo, $email, $codigo)) {
        $_SESSION['msg'] = "Código verificado com sucesso!";
        header('Location: ../view/nova_senha.php');
        exit();
    } else {

        $_SESSION['erro'] = "Código inválido!";
        header('Location: ../view/codigo.php');
        exit();
    }
}
?>
