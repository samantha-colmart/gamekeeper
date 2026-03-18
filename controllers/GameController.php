<?php

namespace App\Controllers;

use App\Models\Game;
use App\Models\Platform;
use App\Models\Genre;

class GameController {

    // Fonction pour vérifier l'image ajoutée par l'utilisateur
    public function imageProcessing(Game $game, array $files): bool {
        if (!isset($files["cover"]) || $files["cover"]["error"] !== 0) {
            return false;
        }
        if ($files["cover"]["size"] > 5 * 1024 * 1024) {
            return false;
        }
        $file_basename  = pathinfo($files["cover"]["name"], PATHINFO_FILENAME);
        $file_extension = pathinfo($files["cover"]["name"], PATHINFO_EXTENSION);
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
        if (!in_array(strtolower($file_extension), $allowedExtensions)) {
            return false;
        }
        $new_image_name = $file_basename . '_' . date('Ymd_His') . '.' . $file_extension;
        move_uploaded_file($files["cover"]["tmp_name"], 'images/' . $new_image_name);
        $game->setImage($new_image_name);
        return true;
    }

    public function collection() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $id_user = $_SESSION['user_id'];
        $games = Game::getAll($id_user);
        $total = Game::countAll($id_user);
        $allPlatforms = Platform::getAllPlatforms();
        $allGenres = Genre::getAllGenres();
        foreach ($games as $game) {
            $platforms = Platform::getPlatformsByGame($game->getId());
            $genres = Genre::getGenreByGame($game->getId());

            $game->setPlatforms($platforms);
            $game->setGenres($genres);
        }
        require 'views/collection.php';
    }

    public function addGame() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title']);
            $description = trim($_POST['description']);
            $studio = trim($_POST['developer']);
            $year = (int)($_POST['year']);
            $duration = (int)($_POST['playtime']);
            $status = $_POST['status'];
            $note = (int)($_POST['rating']);
            $price = (float)($_POST['price']);
            if(isset($_POST['platforms'])){
                $platforms = $_POST['platforms'];
            } else {
                $platforms = [];
            }
            if(isset($_POST['genres'])){
                $genres = $_POST['genres'];
            } else {
                $genres = [];
            }

            if (empty($title) || empty($description) || empty($studio) || empty($year) || empty($duration) || empty($status) || empty($note) || empty($price)) {
                $error = "Veuillez remplir les champs obligatoires.";
            }
            elseif (empty($platforms)) {
                $error = "Veuillez choisir au moins une plateforme.";
            }
            elseif (empty($genres)) {
                $error = "Veuillez choisir au moins un genre.";
            }
            else {
                $game = new Game($title, $description, "", $price, $year, $note, $duration, false, $status, $studio, $_SESSION['user_id']);
                if (!$this->imageProcessing($game, $_FILES)) {
                    $error = "Image invalide ou non uploadée.";
                } else {
                    if ($game->create()) {
                        $gameId = $game->getId();
                        foreach ($platforms as $platformId) {
                            Platform::addPlatformToGame($gameId, (int)$platformId);
                        }
                        foreach ($genres as $genreId) {
                            Genre::addGenreToGame($gameId, (int)$genreId);
                        }
                        header("Location: index.php?action=collection");
                        exit;
                    } else {
                        $error = "Erreur lors de l'ajout du jeu.";
                    }
                }
            }
        }
        $allPlatforms = Platform::getAllPlatforms();
        $allGenres = Genre::getAllGenres();
        require 'views/create-game.php';
    }

    public function GameDetails() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        } elseif (!isset($_GET['id'])){
            header("Location: index.php?action=collection");
            exit;
        }
        $game_id = (int)$_GET['id'];
        $game = Game::getById($game_id);
        $platforms = Platform::getPlatformsByGame($game->getId());
        $genres = Genre::getGenreByGame($game->getId());
        $game->setPlatforms($platforms);
        $game->setGenres($genres);
        require 'views/game-details.php';
    }

    public function error404(){
        require 'views/error404.php';
    }

    public function search() {
        if(isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
        }
        $id_user = $_SESSION['user_id'];
        $games = Game::searchByKeyword($keyword, $id_user);
        $result = [];
        foreach ($games as $game) {
            $platforms = Platform::getPlatformsByGame($game->getId());
            $platformNames = [];
            foreach ($platforms as $p) {
                $platformNames[] = $p->getConsole();
            }
            $result[] = [
                "id" => $game->getId(),
                "title" => $game->getTitle(),
                "image" => $game->getImage(),
                "note" => $game->getNote(),
                "duration" => $game->getDuration(),
                "platforms" => $platformNames
            ];
        }
        echo json_encode($result);
    }

    public function deleteGame() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $game_id = (int) $_POST['id'];
            $game = Game::getById($game_id);
            if ($game) {
                $filePath = 'images/' . $game->getImage();
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                $game->delete();
                Platform::deletePlatformsFromGame($game_id);
                Genre::deleteGenresFromGame($game_id);
            }
        }
        header("Location: index.php?action=collection");
        exit;
    }

    public function updateGame() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
        if (!isset($_GET['id'])) {
            header("Location: index.php?action=collection");
            exit;
        }
        $game_id = (int)$_GET['id'];
        $game = Game::getById($game_id);

        $allPlatforms = Platform::getAllPlatforms();
        $allGenres = Genre::getAllGenres();

        $selectedPlatforms = Platform::getPlatformsByGame($game_id);
        $selectedGenres = Genre::getGenreByGame($game_id);

        $selectedPlatformIds = [];
        foreach ($selectedPlatforms as $p) {
            $selectedPlatformIds[] = $p->getId();
        }

        $selectedGenreIds = [];
        foreach ($selectedGenres as $g) {
            $selectedGenreIds[] = $g->getId();
        }

        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title']);
            $description = trim($_POST['description']);
            $developer = trim($_POST['developer']);
            $year = (int)$_POST['year'];
            $playtime = (int)$_POST['playtime'];
            $status = $_POST['status'];
            $rating = (int)$_POST['rating'];
            $price = (float)$_POST['price'];
            if(isset($_POST['platforms'])){
                $platforms = $_POST['platforms'];
            } else {
                $platforms = [];
            }
            if(isset($_POST['genres'])){
                $genres = $_POST['genres'];
            } else {
                $genres = [];
            }

            if(empty($title) || empty($description) || empty($developer) || empty($year) || empty($playtime) || empty($status) || empty($rating) || empty($price)) {
                $error = "Veuillez remplir tous les champs obligatoires.";
            } elseif (empty($platforms)) {
                $error = "Veuillez choisir au moins une plateforme.";
            } elseif (empty($genres)) {
                $error = "Veuillez choisir au moins un genre.";
            } else {
                $game->setTitle($title);
                $game->setDescription($description);
                $game->setStudio($developer);
                $game->setReleaseYear($year);
                $game->setDuration($playtime);
                $game->setStatus($status);
                $game->setNote($rating);
                $game->setPrice($price);

                if(isset($_FILES['cover']) && $_FILES['cover']['error'] === 0){
                    $oldImagePath = 'images/' . $game->getImage();
                    if(file_exists($oldImagePath)){
                        unlink($oldImagePath);
                    }
                    $this->imageProcessing($game, $_FILES);
                }

                if($game->update()) {
                    Platform::deletePlatformsFromGame($game_id);
                    Genre::deleteGenresFromGame($game_id);

                    foreach($platforms as $platformId){
                        Platform::addPlatformToGame($game_id, (int)$platformId);
                    }
                    foreach($genres as $genreId){
                        Genre::addGenreToGame($game_id, (int)$genreId);
                    }

                    header("Location: index.php?action=game-details&id=".$game_id);
                    exit;
                } else {
                    $error = "Erreur lors de la mise à jour du jeu.";
                }
            }
        }
        require 'views/update-game.php';
    }

}