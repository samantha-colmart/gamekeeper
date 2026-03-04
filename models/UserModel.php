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

}