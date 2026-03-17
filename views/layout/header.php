<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>XPTracker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="header">
        <a href="index.php?action=home" class="logo">
            <i class="fa-solid fa-gamepad"></i>    
            <p>XPTracker</p>
        </a>
        <nav class="nav-buttons">
            <?php
            if(!empty($_SESSION['user_id'])) {
                echo '
                <a href="index.php?action=collection" class="nav-links">
                    <i class="fa-solid fa-border-all"></i>
                    <p>Collection</p>
                </a>
                <a href="index.php?action=statistics" class="nav-links">
                    <i class="fa-regular fa-user"></i>
                    <p>Profil</p>
                </a>
                <a href="index.php?action=logout" class="nav-links">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <p>Deconnexion</p>
                </a>
                ';
            } else {
                echo '
                <a href="index.php?action=register">
                    <button class="btn-primary">Inscription</button>
                </a>
                <a href="index.php?action=login">
                    <button class="btn-secondary">Connexion</button>
                </a>
                ';
            }
            ?>
        </nav>
    </header>
<main>