<?php

namespace App\Controllers;

use App\Models\Game;
use App\Models\Platform;
use App\Models\Genre;

class GameController {

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
            $genres = Genre::getGenresByGame($game->getId());

            $game->setPlatforms($platforms);
            $game->setGenres($genres);
        }
        require 'views/collection.php';
    }


// if($success){
//             $filePath = '../images/' . $this->image;
//             if (file_exists($filePath)) {
//                 unlink($filePath);
//             }
//         }


}