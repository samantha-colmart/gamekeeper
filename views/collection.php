<?php
require_once "layout/header.php";
?>

<section class="container-collection">
    <div class="top-bar">
        <div>
            <h1>Ma Collection</h1>
            <p>4 jeux dans votre bibliothèque</p>
        </div>
        <a href="../index.php?action=create-game" class="create-btn">
            <i class="fa-solid fa-circle-plus"></i>
            <p>Ajouter un jeu</p>
        </a>
    </div>
    <div class="container-filters">
        <div class="top-filters">
            <section class="search">
                <form action="" method="GET">
                    <div class="search-bar">
                        <i class="fa-brands fa-sistrix"></i>
                        <input type="search" name="search" placeholder="Rechercher un jeu...">
                    </div>
                    <div class="filters">
                        <select name="platform" id="platform-select">
                            <option value="all">Toutes les plateformes</option>
                        </select>
                        <select name="genre" id="genre-select">
                            <option value="all">Tous les genres</option>
                        </select>
                    </div>
                </form>
            </section>
        </div>
        <div class="bottom-filters">
            <button class="btn-filters" type="button">Tous</button>
            <button class="btn-filters" type="button">Terminé</button>
            <button class="btn-filters" type="button">En cours</button>
            <button class="btn-filters" type="button">Mes favoris</button>
        </div>
    </div>
    <div class="grid-collection">
        <a href="">
            <article class="card-colection">
                <div class="card-img">
                    <div class="note">
                        <i class="fa-solid fa-star"></i>
                        <p>8 / 10</p>
                    </div>
                    <img src="images/wallpapersden.com_hogwarts-legacy-poster_1920x2322.jpg" alt="">
                </div>
                <div class="card-content">
                    <h2>Titre</h2>
                    <div class="badge-line">
                        <p class="cyan">Badge</p>
                    </div>
                    <div class="footer-content">
                        <div class="time">
                            <i class="fa-regular fa-clock"></i>
                            <p>114h de jeu</p>
                        </div>
                        <button type="submit" name="like" class="like-btn">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                    </div>
                </div>
            </article>
        </a>
        <a href="">
            <article class="card-colection">
                <div class="card-img">
                    <div class="note">
                        <i class="fa-solid fa-star"></i>
                        <p>8 / 10</p>
                    </div>
                    <img src="images/wallpapersden.com_hogwarts-legacy-poster_1920x2322.jpg" alt="">
                </div>
                <div class="card-content">
                    <h2>Titre</h2>
                    <div class="badge-line">
                        <p class="cyan">Badge</p>
                    </div>
                    <div class="footer-content">
                        <div class="time">
                            <i class="fa-regular fa-clock"></i>
                            <p>114h de jeu</p>
                        </div>
                        <button type="submit" name="like" class="like-btn">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                    </div>
                </div>
            </article>
        </a>
    </div>
</section>

<?php
require_once "layout/footer.php";
?>