<?php
require_once "layout/header.php";
?>

<section class="game-page">
    <div class="game-cover">
        <div class="rating">
            <i class="fa-solid fa-star"></i>
            <span><?php echo $game->getNote() ?> / 10</span>
        </div>
        <img src="images/<?php echo $game->getImage() ?>" alt="<?php echo $game->getTitle() ?>">
        <div class="favorite">
            <i class="fa-solid fa-heart"></i>
        </div>
    </div>
    <div class="right-column">
        <div class="game-info">
            <div class="game-info-header">
                <h1><?php echo $game->getTitle() ?></h1>
                <div class="actions">
                    <a href="index.php?action=update-game&id=<?php echo $game->getId() ?>">
                        <button class="edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Modifier
                        </button>
                    </a>
                    <form action="index.php?action=delete-game" method="POST">
                        <input type="hidden" name="id" value="<?php echo $game->getId() ?>">
                        <button type="submit" class="delete">
                            <i class="fa-solid fa-trash"></i>
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
            <div class="stats">
                <div class="stat">
                    <i class="fa-solid fa-clock purple"></i>
                    <div>
                        <span>Temps de jeu</span>
                        <p><?php echo $game->getDuration() ?>h</p>
                    </div>
                </div>
                <div class="stat">
                    <i class="fa-solid fa-calendar cyan"></i>
                    <div>
                        <span>Sortie</span>
                        <p><?php echo $game->getReleaseYear() ?></p>
                    </div>
                </div>
                <div class="stat">
                    <i class="fa-solid fa-tag yellow"></i>
                    <div>
                        <span>Prix</span>
                        <p><?php echo $game->getPrice() ?>€</p>
                    </div>
                </div>
            </div>
            <div class="info-block">
                <label>Plateforme</label>
                <div class="badges-flex">
                    <?php
                    foreach ($game->getPlatforms() as $platform) {
                        echo '<span class="badge purple">' . $platform->getConsole() . '</span>';
                    }
                    ?>
                </div>
            </div>
            <div class="info-block">
                <label>Genre</label>
                <div class="badges-flex">
                    <?php
                    foreach ($game->getGenres() as $genre) {
                        echo '<span class="badge cyan">' . $genre->getType() . '</span>';
                    }
                    ?>
                </div>
            </div>
            <div class="developer">
                <i class="fa-solid fa-building blue"></i>
                <div>
                    <span>Développeur</span>
                    <p><?php echo $game->getStudio() ?></p>
                </div>
            </div>
        </div>
        <div class="game-info">
            <div class="description">
                <h2>Informations complémentaires</h2>
                <p><?php echo $game->getDescription() ?></p>
                <div>
                    <span class="badge green"><?php echo $game->getStatus() ?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once "layout/footer.php";
?>