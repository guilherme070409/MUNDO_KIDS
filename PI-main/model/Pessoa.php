<?php
class pessoa
{
   
    public static function cadastrar($pdo, $nomePai, $nomeMae, $telefone, $dataNascimento,$nome)
    {
        $stmt = $pdo->prepare("INSERT INTO pessoa (nome,nome_pai, nome_mae, telefone,data_nascimento) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([
            $nome,
            $nomePai,
            $nomeMae,
            $telefone,
            $dataNascimento
        ]);

      
        return $pdo->lastInsertId();
    }
}
?>