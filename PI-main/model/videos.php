<?php
class videos

{
   
    public static function cadastrar($pdo,$titulo,$url,$thumbnail, $descricao,$fk_categoria)
    {
        $stmt = $pdo->prepare("INSERT INTO videos (titulo, url, thumbnail, descricao, fk_categoria) VALUES (:titulo, :url, :thumbnail, :descricao, :fk_categoria)");
        return $stmt->execute([
           ':titulo'    => $titulo,
            ':url'       => $url,
            ':thumbnail' => $thumbnail,
            ':descricao' => $descricao,
            ':fk_categoria' => $fk_categoria
        ]);

    }
    public static function listarPorNomeCategoria($pdo, $nome_categoria) {
    $stmt = $pdo->prepare("
        SELECT v.*, c.nome_da_categoria 
        FROM videos v
        JOIN categoria c ON v.fk_categoria = c.id
        WHERE c.nome_da_categoria = :nome_categoria
        ORDER BY v.id DESC
    ");
    $stmt->execute([':nome_categoria' => $nome_categoria]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public static function listar($pdo) {
    $stmt = $pdo->prepare("
        SELECT v.*, c.nome_da_categoria 
        FROM videos v
        JOIN categoria c ON v.fk_categoria = c.id
        ORDER BY v.id DESC
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public static function deletar($pdo, $id)
    {
        $stmt = $pdo->prepare("DELETE FROM videos WHERE id = :ID");
        $stmt->bindParam(':ID', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

public static function editar($pdo, $id, $titulo, $url, $fk_categoria, $thumbnail, $descricao){
    $stmt = $pdo->prepare("UPDATE videos 
                           SET titulo = ?, url = ?, fk_categoria = ?, thumbnail = ?, descricao = ?
                           WHERE ID = ?");
    return $stmt->execute([$titulo, $url, $fk_categoria, $thumbnail, $descricao, $id]);
}


}
?>
