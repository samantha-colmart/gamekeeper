<?php
require_once "layout/header.php";
?>

<section class="container-add-game">
    <a href="#" class="back-link">
        <i class="fa-solid fa-arrow-left"></i> Retour à la collection
    </a>

    <div class="content-add-game">
        <h1>Ajouter un jeu</h1>
        <p>Remplissez les informations pour ajouter un nouveau jeu à votre collection</p>

        <form method="post" enctype="multipart/form-data" action="">
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
                    <input type="checkbox" id="pc" name="platforms[]" value="pc">
                    <label for="pc">PC</label>

                    <input type="checkbox" id="ps5" name="platforms[]" value="ps5">
                    <label for="ps5">PlayStation 5</label>

                    <input type="checkbox" id="ps4" name="platforms[]" value="ps4">
                    <label for="ps4">PlayStation 4</label>

                    <input type="checkbox" id="xbox" name="platforms[]" value="xbox">
                    <label for="xbox">Xbox Series X</label>

                    <input type="checkbox" id="switch" name="platforms[]" value="switch">
                    <label for="switch">Nintendo Switch</label>

                    <input type="checkbox" id="ds" name="platforms[]" value="3ds">
                    <label for="ds">Nintendo 3DS</label>
                </div>

            </div>


            <div class="form-card">
                <h3>Genres</h3>

                <div class="checkbox-grid">
                    <input type="checkbox" id="action" name="genres[]" value="action">
                    <label for="action">Action</label>

                    <input type="checkbox" id="aventure" name="genres[]" value="aventure">
                    <label for="aventure">Aventure</label>

                    <input type="checkbox" id="rpg" name="genres[]" value="rpg">
                    <label for="rpg">RPG</label>

                    <input type="checkbox" id="western" name="genres[]" value="western">
                    <label for="western">Western</label>

                    <input type="checkbox" id="openworld" name="genres[]" value="openworld">
                    <label for="openworld">Monde ouvert</label>

                    <input type="checkbox" id="sport" name="genres[]" value="sport">
                    <label for="sport">Sport</label>

                    <input type="checkbox" id="horror" name="genres[]" value="horror">
                    <label for="horror">Horreur</label>

                    <input type="checkbox" id="strategie" name="genres[]" value="strategie">
                    <label for="strategie">Stratégie</label>
                </div>
            </div>

            <input type="submit" class="btn-add" value="Ajouter le jeu">
        </form>
    </div>
</div>




<?php
require_once "layout/footer.php";
?>