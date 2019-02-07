<!-- DERNIERS AJOUTS -->

<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../components/header.php';
include '../components/navbar.php';
?>

<link rel="stylesheet/less" href="../css/less/ajouts.less">
<link rel="stylesheet/less" href="../css/less/cards.less">

<h3 class="ajouts-titre">Jetez un oeil aux derniers ajouts : </h3>
<div class="ajouts">
    <?php
    include '../models/model-ajouts.php';
    $type = array();
    foreach ($recettes as $recette) :
        if (in_array($recette['r_type'], $type)) {
            continue;
        }
    $type[] = $recette['r_type'];
    ?>
        <div class="card" type="<?= $recette['r_type']; ?>">
            <div class="card-thumb">
                <img src="<?= $recette["p_link"] ?>" alt="test">
                <div class="card-thumb-fav">
                    <label class="fav-checkbox">
                        <input type="hidden" name="fax" value="False" />
                        <input class="fav-checkbox-input" name="alarm" value="True" type="checkbox">
                        <span class="fav-checkbox-icon"><i class="far fa-heart"></i></span>
                    </label>
                </div>
            </div>
            <div class="card-content">
                <div class="card-category">
                    <h3><?= $recette["r_type"] ?></h3>
                </div>
                <div class="card-title">
                    <h2><?= $recette["r_nom"] ?></h2>
                </div>
                <div class="card-text">
                    <p><?= $recette["r_content"] ?>[...]</p>
                </div>
            </div>
            <div class="card-footer">
                <div class="card-footer-date">
                    <p><?= $recette["r_date"] ?></p>
                </div>
                <div class="card-footer-user">
                    <p> by <strong><?= $recette["r_createur"] ?></strong></p>
                </div>
                <a href="recette?id=Robert">Go</a>
            </div>
        </div>
    <?php
    endforeach;
    ?>
</div>

<?php 
include '../components/footer.php';
?>