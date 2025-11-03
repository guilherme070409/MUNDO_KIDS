<?php
session_start();
require_once '../model/Usuarios.php';
require_once '../model/pessoa.php';
require_once '../service/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['username'] ?? ''; 
    $senha = $_POST['password'] ?? '';

    $usuario = usuario::buscarPorEmail($pdo, $login);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        
        if ($usuario['is_adm'] == 'usuario') {
            $_SESSION['pessoa_nome'] = $usuario['nome_de_usuario'];
            $_SESSION['pessoa_email'] = $usuario['email'];
            $_SESSION['tipo'] = 'pessoa';
            $_SESSION['msg'] = "Login realizado com sucesso!";
            $_SESSION['msg_tipo'] = "sucesso";
            
            exibirMensagemRedirect(
                'Login realizado',
                'Login realizado com sucesso!,' . 
                "seja bem vindo " . $usuario['nome_de_usuario'],
                'Você será redirecionado em instantes...',
                '../view/Pagina_inicial/index.php'
            );
        } else  {
            $_SESSION['admin_nome'] = $usuario['nome_de_usuario'];
            $_SESSION['admin_cargo'] = $usuario['is_adm'];
            $_SESSION['tipo'] = 'admin';
            $_SESSION['msg'] = "Login realizado com sucesso!";
            $_SESSION['msg_tipo'] = "sucesso";

   
                 exibirMensagemRedirect(
                'Admin',
                'Bem-vindo(a), ' . htmlspecialchars($usuario['nome_de_usuario']) . '!',
                'Logando na página de admin...',
                '../view/Adm_page/'
            );
        }
    } else {
        $_SESSION['erro'] = "E-mail ou senha incorretos.";
        $_SESSION['msg_tipo'] = "erro";
        header('Location: ../view/login.php');
        exit();
    }
}

function exibirMensagemRedirect($titulo, $cabecalho, $mensagem, $url)
{
    echo '<!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>' . htmlspecialchars($titulo) . '</title>
        <link rel="stylesheet" href="../view/style.css">
    </head>
    <body>
        <div class="container">
            <h2>' . htmlspecialchars($cabecalho) . '</h2>
            <p class="acertomsg">' . htmlspecialchars($mensagem) . '</p>
        </div>
        <script>
            setTimeout(function() {
                window.location.href = "' . htmlspecialchars($url) . '";
            }, 3000);
        </script>
    </body>
    </html>';
    exit();
}
?>
