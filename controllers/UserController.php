<?php

namespace App\Controllers;

use App\Models\User;

class UserController {

    // ---------------------- Validation inscription ----------------------

    private function validateRegister($pseudo, $email, $password, $confirmPassword){
        if(strlen($pseudo) < 2){
            return "Le pseudo doit faire au moins 3 caractères";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "L'adresse mail n'est pas valide";
        }
        if (!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', $password)) {
            return "Le mot de passe doit contenir au moins 8 caractères dont une majuscule, une minuscule, un chiffre et un caractère spécial";
        }
        if ($password !== $confirmPassword) {
            return "Les mots de passe doivent être identiques";
        }
        return true;
    }

    // ---------------------- Inscription ----------------------

    public function register(){
        if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm-password'])) {
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm-password'];
            $validation = $this->validateRegister($pseudo, $email, $password, $confirmPassword);
            if ($validation !== true) {
                $error = $validation;
            } else {
                $user = new User($pseudo, $email, $password);
                if ($user->emailExists()) {
                    $error = "Cet email est déjà utilisé";
                } else {
                    if ($user->create()) {
                        header("Location: index.php?action=login");
                        exit;
                    } else {
                        $error = "Erreur lors de l'inscription";
                    }
                }
            }
        }

        require 'views/register.php';
    }

    // ---------------------- Connexion ----------------------

    public function login(){
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = new User('', $email, $password);
            $data = $user->findByEmail();
            if ($data === false || !password_verify($password, $data['password'])) {
                $error = "Identifiant ou mot de passe incorrect";
            } else {
                $_SESSION['user_id'] = $data['id'];
                header("Location: index.php?action=collection");
                exit;
            }
        }
        require 'views/login.php';
    }

    // ---------------------- Déconnexion ----------------------

    public function logout(){
        session_destroy();
        header("Location: index.php");
        exit;
    }

}



?>