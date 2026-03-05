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

    // Vérification validité données inscription utilisateur
    private function field_verification(string $confirm_password){
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return "L'adresse mail n'est pas valide";
        }
        elseif (!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', $this->password)) {
            return "Le mot de passe doit contenir au moins 8 caractères dont une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial";
        }
        elseif ($this->password !== $confirm_password) {
            return "Les deux mots de passe doivent être égaux";
        }
        return true;
    }

    // Fonction pour enregistrer les données d'inscription de l'utilisateur dans la BDD
    private function recording(string $role){
        $hash = password_hash($this->password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (email, password, role) VALUES (:email, :password, :role)";
        $query = $this->pdo->prepare($sql);
        $query->execute([':email' => $this->email, ':password' => $hash, ':role' => $role]);
        return true;
    }

    // Vérification si username existe déjà dans la BDD
    private function email_exists(): bool {
        $sql = "SELECT id FROM user WHERE email = :email";
        $query = $this->pdo->prepare($sql);
        $query->execute([':email' => $this->email]);
        if ($query->fetch(PDO::FETCH_ASSOC)) {
            return true;
        }
        return false;
    }

    // Processus d'appel pour vérification puis enregistrement inscription dans BDD
    public function sign_up(string $confirm_password) {
        if ($this->email_exists()) {
            return "Cet email est déjà utilisé";
        }
        $validation = $this->field_verification($confirm_password);
        if ($validation !== true) {
            return $validation;
        }
        $role = "utilisateur";
        if (str_contains($this->email, 'admin')) {
            $role = "admin";
        }
        return $this->recording($role);
    }

}