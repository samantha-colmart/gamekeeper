<?php

namespace App\Models;

use App\Config\Database;
use App\Models\User;
use PDO;

class Game extends Database {

    private ?int $id;
    private string $title;
    private string $description;
    private string $image;
    private float $price;
    private int $release_year;
    private int $note;
    private int $duration;
    private bool $favorite;
    private string $status;
    private string $studio;
    private int $id_user;

    public function __construct(string $title, string $description, string $image, float $price, int $release_year, int $note , int $duration, bool $favorite, string $status, string $studio, int $id_user, ?int $id = null){
        parent::__construct();
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->price = $price;
        $this->release_year = $release_year;
        $this->note = $note;
        $this->duration = $duration;
        $this->favorite = $favorite;
        $this->status = $status;
        $this->studio = $studio;
        $this->id_user = $id_user;
        
    }

    // -------------------------------------- Getters ------------------------------------

    public function getId(): ?int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getReleaseYear(): int {
        return $this->release_year;
    }

    public function getNote(): int {
        return $this->note;
    }

    public function getDuration(): int {
        return $this->duration;
    }

    public function getFavorite(): bool {
        return $this->favorite;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function getStudio(): string {
        return $this->studio;
    }

    public function getIdUser(): int {
        return $this->id_user;
    }

    // -------------------------------------- Setters ------------------------------------

    public function setTitle(string $NewTitle): void {
        $this->title = $NewTitle;
    }

    public function setDescription(string $NewDescription): void {
        $this->description = $NewDescription;
    }

    public function setImage(string $NewImage): void {
        $this->image = $NewImage;
    }

    public function setPrice(float $NewPrice): void {
        $this->price = $NewPrice;
    }

    public function setReleaseYear(int $NewYear): void {
        $this->release_year = $NewYear;
    }

    public function setNote(int $NewNote): void {
        $this->note = $NewNote;
    }

    public function setDuration(int $NewDuration): void {
        $this->duration = $NewDuration;
    }

    public function setStatus(string $NewStatus): void {
        $this->status = $NewStatus;
    }

    public function setStudio(string $NewStudio): void {
        $this->studio = $NewStudio;
    }

    // -------------------------------------- Méthodes CRUD ------------------------------------

    // Fonction pour créer un quiz dans BDD
    public function create(): bool {
        $sql = "INSERT INTO game (title, description, image, price, release_year, note, duration, favorite, status, studio, id_user) VALUES (:title, :description, :image, :price, :release_year, :note, :duration, :favorite, :status, :studio, :id_user)";
        $query = $this->pdo->prepare($sql);
        $success = $query->execute([':title' => $this->title, ':description' => $this->description, ':image' => $this->image, ':price' => $this->price, ':release_year' => $this->release_year, ':note' => $this->note, ':duration' => $this->duration, ':favorite' => $this->favorite, ':status' => $this->status, ':studio' => $this->studio, ':id_user' => $this->id_user]);
        if ($success) {
            $this->id = $this->pdo->lastInsertId();
        }
        return $success;
    }

    // Fonction pour modifier un quiz dans BDD
    public function update(): bool {
        if (!$this->id) {
            return false;
        }
        $sql = "UPDATE game SET title = :title, description = :description, image = :image, price = :price, release_year = :release_year, note = :note, duration = :duration, favorite = :favorite, status = :status, studio = :studio WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        return $query->execute([':title' => $this->title, ':description' => $this->description, ':image' => $this->image, ':price' => $this->price, ':release_year' => $this->release_year, ':note' => $this->note, ':duration' => $this->duration, ':favorite' => $this->favorite, ':status' => $this->status, ':studio' => $this->studio, ':id' => $this->id]);
    }

    // Fonction pour supprimer un quiz dans BDD
    public function delete(): bool {
        if (!$this->id) {
            return false;
        }
        $sql = "DELETE FROM game WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $success = $query->execute([':id' => $this->id]);
        return $success;
    }

    // -------------------------------------- Autres méthodes ------------------------------------

    // Fonction pour récupérer tous les jeux de la collection d'un utilisateur
    public static function getAll(int $id_user): array {
        $db = new Database();
        $sql = "SELECT * FROM game WHERE id_user = :id_user";
        $query = $db->pdo->prepare($sql);
        $query->execute([':id_user' => $id_user]);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $games = [];
        foreach ($results as $row) {
            $games[] = new Game($row['title'],$row['description'],$row['image'],$row['price'],$row['release_year'],$row['note'],$row['duration'],$row['favorite'],$row['status'],$row['studio'],$row['id_user'],$row['id']);
        }
        return $games;
    }

    //Fonction pour compter le nombre total de jeux appartenant à la collection de l'utilisateur
    public static function countAll(int $id_user): int {
        $db = new Database();
        $sql = "SELECT COUNT(*) AS total FROM game WHERE id_user = :id_user";
        $query = $db->pdo->prepare($sql);
        $query->execute([':id_user' => $id_user]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return (int)$result['total'];
    }

    // Fonction pour récupérer un jeu de la collection de l'utilisateur à partir de son id
    public static function getById(int $id): ?Game {
        $db = new Database();
        $sql = "SELECT * FROM game WHERE id = :id";
        $query = $db->pdo->prepare($sql);
        $query->execute([':id' => $id]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }
        return new Game($row['title'],$row['description'],$row['image'],$row['price'],$row['release_year'],$row['note'],$row['duration'],$row['favorite'],$row['status'],$row['studio'],$row['id']);
    }

}


?>