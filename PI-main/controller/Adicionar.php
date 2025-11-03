<?php
session_start();
require_once '../model/videos.php';
require_once '../service/conexao.php';

// Dados vindos do formulário
$titulo = $_POST['titulo'];
$url = $_POST['url'];
$categoria_id = $_POST['categoria']; // já vem o ID da categoria
$thumbnail = $_POST['thumbnail'];
$descricao = $_POST['descricao'];

// Cadastra o vídeo diretamente com o ID da categoria
$add_video = videos::cadastrar(
    $pdo,
    $titulo,
    $url,
    $thumbnail,
    $descricao,
    $categoria_id
);

// Verifica se deu certo
if ($add_video) {
    $_SESSION['msg'] = "Vídeo adicionado com sucesso!";
    header('Location: ../view/Adm_page/index.php');
    exit();
} else {
    $_SESSION['erro'] = "Erro ao adicionar o vídeo.";
    header('Location: ../view/Adm_page/index.php');
    exit();
}
?>
