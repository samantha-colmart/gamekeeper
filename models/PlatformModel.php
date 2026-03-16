<?php
namespace App\Models;

use App\Config\Database;
use PDO;


class Platform extends Database {

    public function __construct() {
        parent::__construct();
    }

    // Méthode pour récupérer toutes les plateformes de jeu
    public static function getAllPlatforms(): array {
        $sql = "SELECT * FROM platform";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour récupérer toutes les plateformes d'un jeu
    public static function getPlatformsByGame(int $game_id): array {
        $sql = "SELECT * FROM platform INNER JOIN game_platform ON platform.id = game_platform.platform_id WHERE game_platform.game_id = :game_id";
        $query = $this->pdo->prepare($sql);
        $query->execute([':game_id' => $game_id]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>