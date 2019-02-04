<?php

if (session_status() == PHP_SESSION_NONE) {
session_start();
}

include '../components/header.php';
include '../components/navbar.php';
include '../models/model-communaute.php';
?>
<!-- CSS DE LA PAGE -->

<!-- JS DE DE LA PAGE -->
<script src="../js/scroll.js"></script>
<script src="../js/carousel.js" async></script>

<?php if($dataUnvoted): ?>
<h3 class="communaute-titre">Votez pour vos recettes préférées : </h3>
<div class="carousel-communaute" id="carousel-unvoted">
<?php foreach($dataUnvoted as $recette) : ?>
    <div class="recette-communautaire">
        <div class="large-card" type="<?= $recette['r_type']; ?>">
            <div class="large-card-header">
                <div class="large-card-infos">
                    <div class="large-card-title">
                        <h2><?= $recette["r_nom"] ?></h2>
                    </div>
                    <div class="large-card-more-infos">
                        <div class="difficulte">
                            <h3>Difficulté : <?= $recette["r_difficulte"] ?> / 10</h3>
                        </div>
                        <div class="duree">
                            <h3>Durée : <?= $recette["r_duree"] ?></h3>
                        </div>
                    </div>
                    <div class="large-card-category">
                        <h2><?= $recette["r_type"] ?></h2>
                    </div>
                </div>
                <div class="large-card-thumb">
                    <img src="<?= $recette['p_link']; ?>" alt="test">
                </div>
            </div>
            <div class="large-card-content">
                <div class="scrollbar large-card-text">
                    <p>Déroulé de la recette :</p>
                    <ol>
                        <?= $recette["r_content"] ?>
                    </ol>
                    <div class="force-overflow"></div>
                </div>
                <div class="scrollbar large-card-ingredients">
                    <p>Liste des ingrédients :</p>
                    <ul>
                        <?= $recette["r_ingredients"] ?>
                    </ul>
                </div>
            </div>
            <div class="large-card-footer">
                <form class="form-down" action="../actions/action-communaute.php" method='POST'>
                    <input name="current_id" type="hidden" value="<?= $recette['r_id'] ?>">
                    <button name="down" type="submit"><i class="fas fa-minus"></i></button>
                </form>
                <div class="xp-container">
                    <div class="xp-bar" style="width:<?= $recette['r_votes']; ?>%"></div>
                </div>
                <form class="form-up" action="../actions/action-communaute.php" method='POST'>
                    <input name="current_id" type="hidden" value="<?= $recette['r_id'] ?>">
                    <button name="up" type="submit"><i class='fas fa-plus'></i></button>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
<?php if($dataVoted): ?>
<h3 class="communaute-titre">Voici les recettes pour lesquelles vous avez voté : </h3>
<div class="carousel-communaute" id="carousel-voted">
<?php foreach($dataVoted as $recette) : ?>
    <div class="recette-communautaire">
        <div class="large-card" type="<?= $recette['r_type']; ?>">
            <div class="large-card-header">
                <div class="large-card-infos">
                    <div class="large-card-title">
                        <h2><?= $recette["r_nom"] ?></h2>
                    </div>
                    <div class="large-card-more-infos">
                        <div class="difficulte">
                            <h3>Difficulté : <?= $recette["r_difficulte"] ?> / 10</h3>
                        </div>
                        <div class="duree">
                            <h3>Durée : <?= $recette["r_duree"] ?></h3>
                        </div>
                    </div>
                    <div class="large-card-category">
                        <h2><?= $recette["r_type"] ?></h2>
                    </div>
                </div>
                <div class="large-card-thumb">
                    <img src="<?= $recette['p_link']; ?>" alt="test">
                </div>
            </div>
            <div class="large-card-content">
                <div class="scrollbar large-card-text">
                    <p>Déroulé de la recette :</p>
                    <ol>
                        <?= $recette["r_content"] ?>
                    </ol>
                    <div class="force-overflow"></div>
                </div>
                <div class="scrollbar large-card-ingredients">
                    <p>Liste des ingrédients :</p>
                    <ul>
                        <?= $recette["r_ingredients"] ?>
                    </ul>
                </div>
            </div>
            <div class="large-card-footer">
                <div class="xp-container">
                    <div class="xp-bar" style="width:<?= $recette['r_votes']; ?>%"></div>
                </div>
                <div class="current-votes"><?= $recette['r_votes'];?> %</div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<script>
let onReady = function () {
    
    new Carousel(document.querySelector('#carousel-unvoted'), {
        slidesVisible: 1,
        slidesToScroll: 1,
        infinite: false,
        touch: true
    })

    new Carousel(document.querySelector('#carousel-voted'), {
        slidesVisible: 1,
        slidesToScroll: 1,
        infinite: false,
        touch: true
    })
}

if (document.readyState != 'loading') {
    onReady()
}
document.addEventListener('DOMContentLoaded', onReady())
</script>

<?php 
include '../components/footer.php';
?>