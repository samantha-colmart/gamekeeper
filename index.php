<?php
require 'vendor/autoload.php';

session_start();

use App\Controllers\UserController;
use App\Controllers\GameController;

$userController = new UserController();
$gameController = new GameController();

$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'login':
        $userController->login();
        break;
    case 'register':
        $userController->register();
        break;
    case 'logout':
        $userController->logout();
        break;
    case 'collection':
        $gameController->collection();
        break;
    case 'create-game':
        $gameController->addGame();
        break;
    default:
        require 'views/home.php';
}
