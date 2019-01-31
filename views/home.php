<?php

if (session_status() == PHP_SESSION_NONE) {
session_start();
}

include '../components/header.php';
include '../components/navbar.php';
require '../models/model-home.php';
?>

<link rel="stylesheet/less" href="../css/home.less">

    <div class="home-search">
        <h3 class="home-search-title">Aujourd'hui je cuisine...</h3>
        <form action="../actions/action-search.php" method="GET">
            <div class="home-search-group">
                <input name="search" type="text" placeholder="Je recherche... ">                
                <button class="btn-home" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>

    <div class="random-tiles">
        <h3 class="tiles-title">Jetez un oeil à nos recettes : </h3>
        <?php for ($i=0; $i < 8; $i++) : ?>
        <a class="tiles" href="./recette?r=<?= $home[$i]['r_id']?>"><img src="<?= $home[$i]['p_link']?>" alt=""></a>
        <?php endfor; ?>
    </div>

    <div class="newsletter">
        <h3 class="newsletter-title">Inscrivez vous à la newsletter : </h3>
        <form action="../actions/action-newsletter.php" method='POST'>
            <div class="newsletter-group">
                <input name="email" type="email" placeholder="Entrez votre adresse mail...">
                <button name="submit" class="btn-home" type="submit">S'inscrire</button>
            </div>
        </form>
        <div class="newsletter-text">
            N'hésitez pas à vous inscrire à notre newsletter afin de en rater aucune recette ! Ravivez vos amis avec des plats délicieux et gras...
        </div>
    </div>

    <div class="bandeau-social">
        <h3 class="social-title">Suivez nous sur les réseaux sociaux : </h3>
        <img class="button-social" src="../images/logo/facebook.jpg" alt="logo_facebook">
        <img class="button-social" src="../images/logo/youtube.jpg" alt="logo_youtube">
        <img class="button-social" src="../images/logo/twitter.jpg" alt="logo_twitter">
        <img class="button-social" src="../images/logo/pintereset.jpg" alt="logo_pinterest">
    </div>

<?php 
include '../components/footer.php';
?>