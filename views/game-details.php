<?php
require_once "layout/header.php";
?>

<section class="game-page">
    <div class="game-cover">
        <div class="rating">
            <i class="fa-solid fa-star"></i>
            <span>9 / 10</span>
        </div>
        <img src="images/wallpapersden.com_hogwarts-legacy-poster_1920x2322.jpg" alt="Hogwarts Legacy">
        <div class="favorite">
            <i class="fa-solid fa-heart"></i>
        </div>
    </div>
    <div class="right-column">
        <div class="game-info">
            <div class="game-info-header">
                <h1>Hogwarts Legacy</h1>
                <div class="actions">
                    <a href="">
                        <button class="edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Modifier
                        </button>
                    </a>
                    <a href="">
                        <button class="delete">
                            <i class="fa-solid fa-trash"></i>
                            Supprimer
                        </button>
                    </a>
                </div>
            </div>
            <div class="stats">
                <div class="stat">
                    <i class="fa-solid fa-clock purple"></i>
                    <div>
                        <span>Temps de jeu</span>
                        <p>42h</p>
                    </div>
                </div>
                <div class="stat">
                    <i class="fa-solid fa-calendar cyan"></i>
                    <div>
                        <span>Sortie</span>
                        <p>2023</p>
                    </div>
                </div>
                <div class="stat">
                    <i class="fa-solid fa-tag yellow"></i>
                    <div>
                        <span>Prix</span>
                        <p>69.99€</p>
                    </div>
                </div>
            </div>
            <div class="info-block">
                <label>Plateforme</label>
                <span class="badge purple">PS5</span>
            </div>
            <div class="info-block">
                <label>Genre</label>
                <span class="badge cyan">Monde ouvert</span>
            </div>
            <div class="developer">
                <i class="fa-solid fa-building blue"></i>
                <div>
                    <span>Développeur</span>
                    <p>Avalanche Software</p>
                </div>
            </div>
        </div>
        <div class="game-info">
            <div class="description">
                <h2>Informations complémentaires</h2>
                <p>Hogwarts Legacy : L'Héritage de Poudlard est un RPG d'action-aventure immersif en monde ouvert qui se déroule dans l'univers des livres Harry Potter. 
                    Pour la première fois, découvrez Poudlard dans les années 1800. Vous incarnez une élève détenant la clé d'un ancien secret qui menace de déchirer le monde 
                    des sorciers. Vous pouvez maintenant prendre le contrôle de l'action et être au centre de votre propre aventure dans le monde des sorciers. Votre héritage 
                    vous appartient.</p>
                <div>
                    <span class="badge green">Terminé</span>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once "layout/footer.php";
?>