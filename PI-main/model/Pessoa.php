<?php
class pessoa
{
    public static function cadastrar($pdo, $nomePai, $nomeMae, $telefone, $dataNascimento, $nome)
    {
        $stmt = $pdo->prepare("
            INSERT INTO pessoa (nome, nome_pai, nome_mae, telefone, data_nascimento)
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $nome,
            $nomePai,
            $nomeMae,
            $telefone,
            $dataNascimento
        ]);

        // ✅ Agora sim retorna o id da pessoa criada
        return $pdo->lastInsertId();
    }
}
?>
