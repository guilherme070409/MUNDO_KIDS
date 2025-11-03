<?php
session_start();

require_once '../model/codigo.php';
require_once '../model/Usuarios.php';
require_once '../service/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pessoa = usuario::buscarPorEmail($pdo, $email);

    if ($pessoa) {
        $codigo = rand(100000, 999999);
        Codigo::salvarCodigo($pdo, $email, $codigo);
        $_SESSION['email_recuperacao'] = $email;
        $_SESSION['msg'] = "Código enviado para seu e-mail!";
        header('Location: ../view/codigo.php');
        exit();
    } else {
        $_SESSION['msg'] = "E-mail não cadastrado!";
        header('Location: ../view/recuperar.php');
        exit();
    }
}
?>
