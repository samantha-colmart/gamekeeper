<?php
require_once "layout/header.php";
?>

<section class="error-page">
    <div class="error-card">
        <h1 class="error-code">404</h1>
        <h2 class="error-title">Page introuvable</h2>
        <p class="error-text">
            Oups… la page que vous cherchez semble avoir disparu dans une autre dimension.
        </p>
        <a href="index.php?action=home" class="btn-primary return-btn">
            <i class="fa-solid fa-house"></i>
            Retour à l'accueil
        </a>
    </div>
</section>


<?php
require_once "layout/footer.php";
?>