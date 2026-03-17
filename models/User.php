<?php
namespace App\Models;

use App\Config\Database;
use PDO;


class User extends Database {

    private ?int $id = null;
    private string $pseudo;
    private string $email;
    private string $password;

    public function __construct(string $pseudo, string $email, string $password) {
        session_start();
        parent::__construct();
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->password = $password;
    }

    // -------------------------------------- Getters ------------------------------------

    public function getId(): ?int {
        return $this->id;
    }

    public function getPseudo(): string {
        return $this->pseudo;
    }

    public function getEmail(): string {
        return $this->email;
    }

    // ------------------------------------- Inscription ------------------------------------------

    // Fonction pour enregistrer les données d'inscription de l'utilisateur dans la BDD
    public function create(): bool{
        $hash = password_hash($this->password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (pseudo, email, password) VALUES (:pseudo, :email, :password)";
        $query = $this->pdo->prepare($sql);
        return $query->execute([':pseudo' => $this->pseudo, ':email' => $this->email, ':password' => $hash]);
    }

    // Vérification si email existe déjà dans la BDD
    public function emailExists(): bool    {
        $sql = "SELECT id FROM user WHERE email = :email";
        $query = $this->pdo->prepare($sql);
        $query->execute([':email' => $this->email]);
        return $query->fetch(PDO::FETCH_ASSOC) !== false;
    }

    // ------------------------------------- Connexion ------------------------------------------

    // Récupération des informations d'un utilisateur
    public function findByEmail(){
        $sql = "SELECT id, password FROM user WHERE email = :email";
        $query = $this->pdo->prepare($sql);
        $query->execute([':email' => $this->email]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

}