<?php
require_once "layout/header.php";
?>

<section class="container-add-game">
    <a href="index.php?action=collection" class="back-link">
        <i class="fa-solid fa-arrow-left"></i> Retour à la collection
    </a>

    <div class="content-add-game">
        <h1>Ajouter un jeu</h1>
        <p>Remplissez les informations pour ajouter un nouveau jeu à votre collection</p>

        <form method="post" enctype="multipart/form-data" action="">
            <?php 
            if (!empty($error)){
                echo '<p class="form-error">' . $error .  '</p>';
            }
            ?>
            <div class="form-card">
                <h3>Image de couverture</h3>
                <input type="file" id="cover" name="cover" accept="image/*">
                <label for="cover" class="cover-upload">
                    <i class="fa-solid fa-image"></i>
                    <span>Choisir une image</span>
                </label>
            </div>

            <div class="form-card">
                <h3>Informations du jeu</h3>

                <div class="form-group">
                    <label>Titre du jeu</label>
                    <input type="text" name="title">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description"></textarea>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label>Développeur</label>
                        <input type="text" name="developer">
                    </div>

                    <div class="form-group">
                        <label>Année de sortie</label>
                        <input type="number" name="year" min=1970 max=<?php echo date("Y")?>>
                    </div>

                    <div class="form-group">
                        <label>Temps de jeu (heures)</label>
                        <input type="number" name="playtime" min=0>
                    </div>

                    <div class="form-group">
                        <label>Statut</label>
                        <select name="status">
                            <option>Terminé</option>
                            <option>En cours</option>
                            <option>Abandonné</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Note (sur 10)</label>
                        <input type="number" name="rating" min=0 max=10>
                    </div>

                    <div class="form-group">
                        <label>Prix (en euros)</label>
                        <input type="number" name="price" min=0>
                    </div>

                </div>
            </div>

            <div class="form-card">
                <h3>Plateformes</h3>
                <div class="checkbox-grid">
                    <?php
                    foreach ($allPlatforms as $value) {
                        echo '
                        <input type="checkbox" id="' . $value->getConsole() . '" name="platforms[]" value="' . $value->getId() . '">
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
                        echo '
                        <input type="checkbox" id="' . $value->getType() . '" name="genres[]" value="' . $value->getId() . '">
                        <label for="' . $value->getType() . '">' . $value->getType() . '</label>';
                    }
                    ?>
                </div>
            </div>

            <input type="submit" class="btn-add" value="Ajouter le jeu">
        </form>
    </div>
</div>




<?php
require_once "layout/footer.php";
?>