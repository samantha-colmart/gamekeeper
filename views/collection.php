<?php
require_once "layout/header.php";
?>

<section class="container-collection">
    <div class="top-bar">
        <div>
            <h1>Ma Collection</h1>
            <?php
            if($total > 0){
                echo '<p>' . $total . ' jeux dans votre bibliothèque</p>';
            } else {
                echo '<p>Aucun jeu pour le moment</p>';
            }
            ?>
        </div>
        <a href="index.php?action=create-game" class="create-btn">
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
                        <input type="search" id="myKeyword" name="search" placeholder="Rechercher un jeu..." onkeyup="searchKeyword()" >
                    </div>
                    <div class="filters">
                        <select name="platform" id="platform-select">
                            <option value="all">Toutes les plateformes</option>
                            <?php
                            foreach ($allPlatforms as $value) {
                                echo '<option value="' . $value->getConsole() . '">' . $value->getConsole() . '</option>';
                            }
                            ?>
                        </select>
                        <select name="genre" id="genre-select">
                            <option value="all">Tous les genres</option>
                            <?php
                            foreach ($allGenres as $value) {
                                echo '<option value="' . $value->getType() . '">' . $value->getType(). '</option>';
                            }
                            ?>
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
    <?php
    if(count($games) > 0){
        echo '<div class="grid-collection">';
            foreach ($games as $game) {
                echo '
                <a href="index.php?action=game-details&id=' . $game->getId() . '">
                    <article class="card-colection">
                        <div class="card-img">
                            <div class="note">
                                <i class="fa-solid fa-star"></i>
                                <p>' . $game->getNote() . ' / 10</p>
                            </div>
                            <img src="images/' . $game->getImage() . '" alt="Photo ' . $game->getTitle() . '">
                        </div>
                        <div class="card-content">
                            <h2>' . $game->getTitle() . '</h2>
                            <div class="badge-line">';
                                foreach ($game->getPlatforms() as $platform) {
                                    echo '<p class="cyan">' . $platform->getConsole() . '</p>';
                                }
                            echo '</div>
                            <div class="footer-content">
                                <div class="time">
                                    <i class="fa-regular fa-clock"></i>
                                    <p>' . $game->getDuration() . 'h de jeu</p>
                                </div>
                                <button type="submit" name="like" class="like-btn">
                                    <i class="fa-solid fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </article>
                </a>
                ';
            }
        echo '</div>';
    } else {
        echo '<h3>Votre collection est vide</h3>';
    }
    ?>
</section>
<script src="js/collection.js"></script>
<?php
require_once "layout/footer.php";
?>