<?php
session_start();
require_once __DIR__ . '/../model/Usuarios.php';
class PerfilController
{
    public static function buscarDadosUsuario($usuarioId)
    {
        global $pdo;

        // Puxa os dados do usuário pelo ID
        $usuario = Usuario::buscarPorId($pdo, $usuarioId);

        if ($usuario) {
            return $usuario;
        } else {
            return null;
        }
    }
}
?>
