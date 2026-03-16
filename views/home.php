<?php
require_once "layout/header.php";
?>

<section class="hero">
    <h1>Gérer votre Collection de Jeux Vidéos</h1>
    <p>GameKeeper vous permet d'organiser, suivre et analyser votre bibliothèque de jeux avec une interface immersive et des fonctionnalités avancées.</p>
    <div class="hero-buttons">
        <a href="index.php?action=register">
            <button class="btn-primary">
                Créer votre collection 
                <i class="fa-solid fa-arrow-right-long"></i>
            </button>
        </a>
        <a href="index.php?action=login">
            <button class="btn-secondary">Se connecter</button>
        </a>
    </div>
</section>

<section class="hero-image">
    <img src="images/javier-martinez-hUD0PUczwJQ-unsplash.jpg" alt="Manette">
</section>

<section class="features-section">
    <h2>Fonctionnalités puissantes</h2>
    <p class="features-subtitle">Tout ce dont vous avez besoin pour gérer votre collection</p>
    <div class="features">
        <div class="card">
            <i class="fa-solid fa-table purple"></i>
            <div>
                <h3>Collection organisée</h3>
                <p>Gérez votre bibliothèque de jeux avec une interface intuitive</p>
            </div>
        </div>
        <div class="card">
            <i class="fa-solid fa-magnifying-glass cyan"></i>
            <div>
                <h3>Recherche avancée</h3>
                <p>Filtrez par plateforme, genre, statut et bien plus encore.</p>
            </div>
        </div>
        <div class="card">
            <i class="fa-solid fa-chart-simple blue"></i>
            <div>
                <h3>Statistiques détaillées</h3>
                <p>Suivez votre temps de jeu, vos genres préférés et vos progressions</p>
            </div>
        </div>
        <div class="card">
            <i class="fa-solid fa-shield green"></i>
            <div>
                <h3>Données sécurisées</h3>
                <p>Vos informations sont protégées et sauvegardées en toute sécurité</p>
            </div>
        </div>
    </div>
</section>


<section class="cta">
    <i class="fa-solid fa-gamepad"></i>  
    <h2>Prêt à Organiser Votre Collection ?</h2>
    <p>Rejoignez XPTracker et découvrez une nouvelle façon de gérer vos jeux vidéo.</p>
    <a href="index.php?action=register">
        <button class="btn-primary">
            Créer votre collection
            <i class="fa-solid fa-arrow-right-long"></i>
        </button>
    </a>
</section>

<?php
require_once "layout/footer.php";
?>
