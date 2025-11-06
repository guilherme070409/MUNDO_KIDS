<?php
class categoria
{
    public static function cadastrar($pdo, $categoria)
    {
       $stmt = $pdo->prepare("INSERT INTO categoria (nome_da_categoria) VALUES (:nome_da_categoria)");
        return $stmt->execute([
           ':nome_da_categoria'    => $categoria,
       
        ]);

    }
   
public static function buscarcategoria($pdo, $categoria)
{
    $stmt = $pdo->prepare("SELECT id FROM categoria WHERE nome_da_categoria = :nome_da_categoria");
    $stmt->execute([':nome_da_categoria' => $categoria]);
    return $stmt->fetch(PDO::FETCH_ASSOC); 
}


  public static function listar($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM categoria ORDER BY nome_da_categoria ASC");
    $stmt->execute();
return $pdo->lastInsertId();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
?>
