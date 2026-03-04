<?php
namespace App\Config;

use PDO;
use PDOException;

class Database {
    protected PDO $pdo;
    private string $host = "localhost";
    private string $username = "root";
    private string $password = "";
    private string $database = "gamekeeper";

    public function __construct() {
        try {
            $this->pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->database};charset=utf8", $this->username, $this->password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }
}