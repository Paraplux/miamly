<?php

if (session_status() == PHP_SESSION_NONE) {
session_start();
}

include '../components/header.php';
include '../components/navbar.php';
include '../models/model-communaute.php';
?>
<link rel="stylesheet/less" href="../css/communaute.less">
<link rel="stylesheet/less" href="../css/large-cards.less">
<link rel="stylesheet/less" href="../css/scroll.less">

<h3 class="communaute-titre">Votez pour vos recettes préférées : </h3>
<?php foreach($data as $recette) : ?>
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
                <img src="../images/thumbs/recettes/brownie.jpg" alt="test">
            </div>
        </div>
        <div class="large-card-content">
            <div class="scrollbar large-card-text">
                <p>Déroulé de la recette :</p>
                <p><?= $recette["r_content"] ?></p>
                <div class="force-overflow"></div>
            </div>
            <div class="large-card-ingredients">
                <p>Liste des ingrédients :</p>
                <ol>
                    <li>Ingrédient 1</li>
                    <li>Ingrédient 2</li>
                    <li>Ingrédient 3</li>
                    <li>Ingrédient 4</li>
                </ol>
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
<script src="../js/scroll.js"></script>
<?php endforeach; ?>
<?php 
include '../components/footer.php';
?>