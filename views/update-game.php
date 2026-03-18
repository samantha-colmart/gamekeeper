<?php
require_once "layout/header.php";
?>

<section class="container-add-game">
    <a href="index.php?action=collection" class="back-link">
        <i class="fa-solid fa-arrow-left"></i> Retour à la collection
    </a>

    <div class="content-add-game">
        <h1>Modifier le jeu</h1>
        <p>Modifiez les informations pour mettre à jour votre jeu</p>

        <form method="post" enctype="multipart/form-data" action="">
            <?php 
            if (!empty($error)){
                echo '<p class="form-error">' . $error .  '</p>';
            }
            ?>
            <div class="form-card">
                <h3>Image de couverture</h3>
                <label for="cover" class="cover-upload">
                    <img id="previewImage" src="images/<?php echo htmlspecialchars($game->getImage()) ?>" alt="Image prévisualisée">
                    <div class="inputImage">
                        <i class="fa-solid fa-image"></i>
                        <span>Choisir une image (5 Mo max)</span>
                    </div>
                </label>
                <input type="file" id="cover" name="cover" accept="image/*">
                <script src="js/preview.js"></script>
            </div>

            <div class="form-card">
                <h3>Informations du jeu</h3>

                <div class="form-group">
                    <label>Titre du jeu</label>
                    <input type="text" name="title" value="<?php echo htmlspecialchars($game->getTitle()) ?>">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description"><?php echo htmlspecialchars($game->getDescription()) ?></textarea>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label>Développeur</label>
                        <input type="text" name="developer" value="<?php echo htmlspecialchars($game->getStudio()) ?>">
                    </div>

                    <div class="form-group">
                        <label>Année de sortie</label>
                        <input type="number" name="year" min=1970 max=<?php echo date("Y") ?> 
                               value="<?php echo $game->getReleaseYear() ?>">
                    </div>

                    <div class="form-group">
                        <label>Temps de jeu (heures)</label>
                        <input type="number" name="playtime" min=0 value="<?php echo $game->getDuration() ?>">
                    </div>

                    <div class="form-group">
                        <label>Statut</label>
                        <select name="status">
                            <option value="Terminé" <?php if($game->getStatus() === 'Terminé'){ echo 'selected'; } ?>>Terminé</option>
                            <option value="En cours" <?php if($game->getStatus() === 'En cours'){ echo 'selected'; } ?>>En cours</option>
                            <option value="A commencer" <?php if($game->getStatus() === 'A commencer'){ echo 'selected'; } ?>>A commencer</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Note (sur 10)</label>
                        <input type="number" name="rating" min=0 max=10 value="<?php echo $game->getNote() ?>">
                    </div>

                    <div class="form-group">
                        <label>Prix (en euros)</label>
                        <input type="number" name="price" min=0 step="0.01" value="<?php echo $game->getPrice() ?>">
                    </div>

                </div>
            </div>

            <div class="form-card">
                <h3>Plateformes</h3>
                <div class="checkbox-grid">
                    <?php
                    foreach ($allPlatforms as $value) {
                        if(in_array($value->getId(), $selectedPlatformIds)){
                            $checked = 'checked';
                        } else {
                            $checked = "";
                        }
                        echo '
                        <input type="checkbox" id="' . $value->getConsole() . '" name="platforms[]" value="' . $value->getId() . '" ' . $checked . '>
                        <label for="' . $value->getConsole() . '">' . $value->getConsole() . '</label>';
                    }
                    ?>
                </div>
            </div>

            <div class="form-card">
                <h3>Genres</h3>
                <div class="checkbox-grid">
                    <?php
                    foreach ($allGenres as $value) {
                        if(in_array($value->getId(), $selectedGenreIds)){
                            $checked = 'checked';
                        } else {
                            $checked = "";
                        }
                        echo '
                        <input type="checkbox" id="' . $value->getType() . '" name="genres[]" value="' . $value->getId() . '" ' . $checked . '>
                        <label for="' . $value->getType() . '">' . $value->getType() . '</label>';
                    }
                    ?>
                </div>
            </div>

            <input type="submit" class="btn-add" value="Modifier le jeu">
        </form>
    </div>
</section>

<?php
require_once "layout/footer.php";
?>