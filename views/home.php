<?php

if (session_status() == PHP_SESSION_NONE) {
session_start();
}

include '../components/header.php';
include '../components/navbar.php';
include '../controllers/controller-recettes.php';
?>
<link rel="stylesheet" href="../css/cards.css">
<div class="container">

<?php
foreach($recettes as $recette ):

    if($recette["r_type"] == "Dessert"){
        $color="blue";
    } else if ($recette["r_type"] == "Plat"){
        $color="red";
    } else if ($recette["r_type"] == "Entrée"){
        $color="yellow";
    }
 ?>

    <div class="card" id="<?=$color  ?>">
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