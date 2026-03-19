<?php
require_once "layout/header.php";
?>

<section class="dashboard">
    <div class="left-column">
        <div class="profile-card">
            <div class="avatar">
                <i class="fa-regular fa-user"></i>
            </div>
            <h2><?php echo $user->getPseudo() ?></h2>
            <p class="role">Joueur passionné</p>
            <div class="email">
                <i class="fa-solid fa-envelope"></i>
                <span><?php echo $user->getEmail() ?></span>
            </div>
        </div>

        <div class="top-games">
            <h3>Top 3 des jeux les mieux notés</h3>
            <?php 
            if(!empty($topGames[0])){
            echo '<div class="game gold">
                <p>' . $topGames[0]->getTitle() . '</p>
            </div>';
            }
            if(!empty($topGames[1])){
            echo '<div class="game silver">
                <p>' . $topGames[1]->getTitle() . '</p>
            </div>';
            }
            if(!empty($topGames[2])){
            echo '<div class="game bronze">
                <p>' . $topGames[2]->getTitle() . '</p>
            </div>';
            }
            ?>
        </div>
    </div>

    <div class="right-column-dashboard">
        <h2 class="title">Statistiques</h2>

        <div class="stats-grid">
            <div class="stat-card">
                <i class="fa-solid fa-clock purple"></i>
                <h3 class="color-purple"><?php echo $playtime ?>h</h3>
                <p>Temps de jeu</p>
            </div>

            <div class="stat-card">
                <i class="fa-solid fa-gamepad cyan"></i>
                <h3 class="color-cyan"><?php echo $total ?></h3>
                <p>Jeux au total</p>
            </div>

            <div class="stat-card">
                <i class="fa-solid fa-trophy green"></i>
                <h3 class="color-green"><?php echo $gamePlayed ?></h3>
                <p>Jeux terminés</p>
            </div>

            <div class="stat-card">
                <i class="fa-solid fa-chart-simple blue"></i>
                <h3 class="color-blue"><?php echo $completeness ?>%</h3>
                <p>Complétude</p>
            </div>
        </div>

        <div class="charts">
            <div class="chart-card">
                <h3>Répartition par genre</h3>
                <div class="chart-container">
                    <canvas id="ChartGenres"></canvas>
                </div>
            </div>

            <div class="chart-card">
                <h3>Répartition par plateforme</h3>
                <div class="chart-container">
                    <canvas id="ChartPlatforms"></canvas>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
            const platformsData = <?php echo json_encode($platforms) ?>;
            const genresData = <?php echo json_encode($genres) ?>;
            </script>
            <script src="js/charts.js"></script>
        </div>
    </div>
</section>



<?php
require_once "layout/footer.php";
?>