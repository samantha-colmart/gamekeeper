<?php
require_once "layout/header.php";
?>

<section class="container-form">
    <i class="fa-solid fa-gamepad"></i>
    <h1>Bon Retour !</h1>
    <p>Connectez-vous pour accéder à votre collection</p>
    <div class="card-form">
        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" class="btn">Se connecter</button>
        </form>
        <div class="bottom-text">
            <p>Pas encore de compte ?</p>
            <a href="inscription.php">Créer un compte</a>
        </div>
    </div>
</section>

<?php
require_once "layout/footer.php";
?>