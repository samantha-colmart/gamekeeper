<?php
require_once "layout/header.php";
?>

<section class="dashboard">
    <div class="left-column">
        <div class="profile-card">
            <div class="avatar">
                <i class="fa-regular fa-user"></i>
            </div>
            <h2>ProGamerDu06</h2>
            <p class="role">Joueur passionné</p>
            <div class="email">
                <i class="fa-solid fa-envelope"></i>
                <span>progamerdu06@gmail.com</span>
            </div>
        </div>

        <div class="top-games">
            <h3>Top 3 des jeux les mieux notés</h3>
            <div class="game gold">
                <p>Red Dead Redemption 2</p>
            </div>
            <div class="game silver">
                <p>Hogwarts Legacy</p>
            </div>
            <div class="game bronze">
                <p>Horizon Forbidden West</p>
            </div>
        </div>
    </div>

    <div class="right-column-dashboard">
        <h2 class="title">Statistiques</h2>

        <div class="stats-grid">
            <div class="stat-card">
                <i class="fa-solid fa-clock purple"></i>
                <h3 class="color-purple">421h</h3>
                <p>Temps de jeu</p>
            </div>

            <div class="stat-card">
                <i class="fa-solid fa-gamepad cyan"></i>
                <h3 class="color-cyan">5</h3>
                <p>Jeux au total</p>
            </div>

            <div class="stat-card">
                <i class="fa-solid fa-trophy green"></i>
                <h3 class="color-green">2</h3>
                <p>Jeux terminés</p>
            </div>

            <div class="stat-card">
                <i class="fa-solid fa-chart-simple blue"></i>
                <h3 class="color-blue">40%</h3>
                <p>Complétude</p>
            </div>
        </div>

        <div class="charts">
            <div class="chart-card">
                <h3>Répartition par genre</h3>
                <div class="chart-placeholder"></div>
            </div>

            <div class="chart-card">
                <h3>Répartition par plateforme</h3>
                <div class="chart-placeholder"></div>
            </div>
        </div>
    </div>
</section>


<?php
require_once "layout/footer.php";
?>