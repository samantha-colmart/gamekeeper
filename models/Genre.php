<?php
namespace App\Models;

use App\Config\Database;
use PDO;


class Genre extends Database {

    public function __construct() {
        parent::__construct();
    }

    // Méthode pour récupérer tous les genres de jeu
    public static function getAllGenres(): array {
        $db = new Database();
        $sql = "SELECT * FROM genre";
        $query = $db->pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour récupérer tous les genres d'un jeu
    public static function getGenreByGame(int $game_id): array {
        $db = new Database();
        $sql = "SELECT * FROM genre INNER JOIN game_genre ON genre.id = game_genre.genre_id WHERE game_genre.game_id = :game_id";
        $query = $db->pdo->prepare($sql);
        $query->execute([':game_id' => $game_id]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>