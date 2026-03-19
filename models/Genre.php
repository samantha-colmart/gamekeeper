<?php
namespace App\Models;

use App\Config\Database;
use PDO;


class Genre extends Database {

    private int $id;
    private string $type;

    public function __construct(int $id, string $type) {
        parent::__construct();
        $this->id = $id;
        $this->type = $type;
    }

    // -------------------------------------- Getters ------------------------------------

    public function getId(): int {
        return $this->id;
    }

    public function getType(): string {
        return $this->type;
    }

    // Méthode pour récupérer tous les genres de jeu
    public static function getAllGenres(): array {
        $db = new Database();
        $sql = "SELECT * FROM genre";
        $query = $db->pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $genres = [];
        foreach ($results as $row) {
            $genres[] = new Genre($row['id'], $row['type']);
        }
        return $genres;
    }

    // Méthode pour récupérer tous les genres d'un jeu
    public static function getGenreByGame(int $game_id): array {
        $db = new Database();
        $sql = "SELECT * FROM genre INNER JOIN game_genre ON genre.id = game_genre.genre_id WHERE game_genre.game_id = :game_id";
        $query = $db->pdo->prepare($sql);
        $query->execute([':game_id' => $game_id]);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $genres = [];
        foreach ($results as $row) {
            $genres[] = new Genre($row['id'], $row['type']);
        }
        return $genres;
    }

    // Méthode pour lier un genre à un jeu
    public static function addGenreToGame(int $gameId, int $genreId): bool {
        $db = new Database();
        $sql = "INSERT INTO game_genre (game_id, genre_id) VALUES (:game_id, :genre_id)";
        $query = $db->pdo->prepare($sql);
        return $query->execute([':game_id' => $gameId, ':genre_id' => $genreId]);
    }

    // Supprime tous les genres d’un jeu
    public static function deleteGenresFromGame(int $gameId): bool {
        $db = new Database();
        $sql = "DELETE FROM game_genre WHERE game_id = :game_id";
        $stmt = $db->pdo->prepare($sql);
        return $stmt->execute([':game_id' => $gameId]);
    }

    // Fonction pour récupérer toutes les plateformes d'un utilisateur
    public static function breakdownByGenre(int $id_user): array {
        $db = new Database();
        $sql = "SELECT genre.type, COUNT(*) as total FROM game_genre
                INNER JOIN genre ON game_genre.genre_id = genre.id
                INNER JOIN game ON game_genre.game_id = game.id
                WHERE game.id_user = :id_user GROUP BY genre.type ORDER BY total DESC";
        $query = $db->pdo->prepare($sql);
        $query->execute([':id_user' => $id_user]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>