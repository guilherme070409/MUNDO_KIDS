<?php
class Codigo
{
    public static function salvarCodigo($pdo, $email, $codigo)
    {
        $stmt = $pdo->prepare("INSERT INTO codigos (email, codigo) VALUES (?, ?)");
        return $stmt->execute([$email, $codigo]);
    }

    public static function verificarCodigo($pdo, $email, $codigo)
    {
        $stmt = $pdo->prepare("SELECT * FROM codigos WHERE email = ? AND codigo = ?");
        $stmt->execute([$email, $codigo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
