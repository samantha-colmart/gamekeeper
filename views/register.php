<?php
require_once "layout/header.php";
?>

<section class="container-form">
    <i class="fa-solid fa-gamepad"></i>
    <h1>Créer un compte</h1>
    <p>Rejoignez GameKeeper et commencez à organiser votre collection</p>
    <div class="card-form">
        <form method="POST" action="">
            <?php 
            if (!empty($error)){
                echo '<p class="form-error">' . $error .  '</p>';
            }
            ?>
            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirmation du mot de passe</label>
                <input type="password" name="confirm-password" id="confirm-password" required>
            </div>
            <button type="submit" class="btn">Créer mon compte</button>
        </form>
        <div class="bottom-text">
            <p>Vous avez déjà un compte ?</p>
            <a href="index.php?action=login">Se connecter</a>
        </div>
    </div>
</section>

<?php
require_once "layout/footer.php";
?>