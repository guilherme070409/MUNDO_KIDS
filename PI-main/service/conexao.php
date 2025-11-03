<?php

class UsePDO
{
    private $conn;

    public function __construct()
    {
        $host = 'localhost';
        $dbname = 'mundo_kids';
        $username = 'root';
        $password = '';

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

$db = new UsePDO();
$pdo = $db->getConnection();
