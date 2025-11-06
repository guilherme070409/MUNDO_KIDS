<?php
session_start();
require_once '../model/Usuarios.php';
require_once '../model/Pessoa.php';
require_once '../service/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $is_adm = 'usuario';
    $nome_de_usuario = $_POST['userName'] ?? '';
    $nome           = $_POST['fullName']         ?? '';
    $nomePai        = $_POST['fatherName']       ?? '';
    $nomeMae        = $_POST['motherName']       ?? '';
    $email          = $_POST['yourEmail']        ?? '';
    $telefone       = $_POST['telefone']         ?? '';
    $dataNascimento = $_POST['data_nascimento']  ?? '';
    $senha          = $_POST['password']         ?? '';
    $confirmarSenha = $_POST['confirmPassword']  ?? '';
    $avatar         = $_POST['avatar']           ?? null;

    // Validações básicas
    if ($senha !== $confirmarSenha) {
        $_SESSION['msg'] = "As senhas não coincidem!";
        header('Location: ../view/registro.php');
        exit();
    }

    if (empty($nome) || empty($email) || empty($nome_de_usuario)) {
        $_SESSION['msg'] = "Preencha todos os campos obrigatórios!";
        header('Location: ../view/registro.php');
        exit();
    }

    try {
        // Verificar se email ou nome de usuário já existem
        $usuarioExistente = usuario::buscarPorEmail($pdo, $email);
        if ($usuarioExistente) {
            $_SESSION['msg'] = "Email já cadastrado!";
            header('Location: ../view/registro.php');
            exit();
        }

        // Buscar ID da foto de perfil se foi selecionada
        $fk_foto_perfil = null;
        if ($avatar) {
            $caminhoCompleto = "img/" . $avatar;
            $fk_foto_perfil = buscarIdFotoPorCaminho($pdo, $caminhoCompleto);
            
            // Debug
            if (!$fk_foto_perfil) {
                error_log("Avatar não encontrado: " . $caminhoCompleto);
            }
        }

        // Primeiro cadastra a pessoa
        $idPessoa = Pessoa::cadastrar(
            $pdo,
            $nomePai,
            $nomeMae,
            $telefone,
            $dataNascimento,
            $nome
        );

        if (!$idPessoa) {
            throw new Exception("Erro ao cadastrar dados pessoais");
        }

        // Depois cadastra o usuário
        $registroFeito = usuario::cadastrar(
            $pdo,
            $email,
            $senha,
            $is_adm,
            $nome_de_usuario,
            $fk_foto_perfil,
            $idPessoa
        );

        if ($registroFeito) {
            $_SESSION['msg'] = "Registro feito com sucesso!";
            header('Location: ../view/login.php');
            exit();
        } else {
            throw new Exception("Erro ao registrar usuário");
        }

    } catch (Exception $e) {
        $_SESSION['erro'] = "Erro ao registrar: " . $e->getMessage();
        header('Location: ../view/registro.php');
        exit();
    }
}

// Função auxiliar para buscar ID da foto - COM NOME CORRETO DA TABELA
function buscarIdFotoPorCaminho($pdo, $caminho) {
    $stmt = $pdo->prepare("SELECT id FROM fotos_perfil WHERE caminho = ?");
    $stmt->execute([$caminho]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['id'] : null;
}
?>