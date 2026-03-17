<?php
namespace App\Models;

use App\Config\Database;
use PDO;


class Platform extends Database {

    private int $id;
    private string $console;

    public function __construct(int $id, string $console) {
        parent::__construct();
        $this->id = $id;
        $this->console = $console;
    }

    // -------------------------------------- Getters ------------------------------------

    public function getId(): int {
        return $this->id;
    }

    public function getConsole(): string {
        return $this->console;
    }

    // Méthode pour récupérer toutes les plateformes de jeu
    public static function getAllPlatforms(): array {
        $db = new Database();
        $sql = "SELECT * FROM platform";
        $query = $db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $platforms = [];
        foreach ($results as $row) {
            $platforms[] = new Platform($row['id'], $row['console']);
        }
        return $platforms;
    }

    // Méthode pour récupérer toutes les plateformes d'un jeu
    public static function getPlatformsByGame(int $game_id): array {
        $db = new Database();
        $sql = "SELECT * FROM platform INNER JOIN game_platform ON platform.id = game_platform.platform_id WHERE game_platform.game_id = :game_id";
        $query = $db->pdo->prepare($sql);
        $query->execute([':game_id' => $game_id]);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $platforms = [];
        foreach ($results as $row) {
            $platforms[] = new Platform($row['id'], $row['console']);
        }
        return $platforms;
    }
}

?>