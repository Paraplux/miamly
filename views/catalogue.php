<!-- TOP 10 RECETTES -->
<!-- TOUT POUR MON BIDON -->
<!-- MES SELECTIONS -->
<!-- MANGER SUR LE POUCE -->
<!-- A PARTAGER  -->

<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../components/header.php';
include '../components/navbar.php';

if(isset($_GET['search'])) {

    require '../models/model-search.php';
    
} else if (isset($_GET['choix'])) {
    
    require '../models/model-choix.php';

} else {
    echo '<script> window.location.href = "../views/home"</script>';
}
?>
<link rel="stylesheet/less" href="../css/catalogue.less">
<link rel="stylesheet/less" href="../css/cards.less">
<!--
Voir le $_GET
Si get'search' = affichage des résultats de la recherche
Si get'search' = pané frit, on affiche la spéciale GROS
Si get'choix' on regarde le paramètre 
    Si choix = top alors on affiche les top 10 recettes par nombres de commentaires
    Si choix = favoris on affiche les recettes mises en favoris par l'utilisateur
    Si choix = best on affiche les recettes les plus compliquées
    Si choix = easy on affiche les recettes les plus faciles
    Si choix = rapide on affiche les recettes rapides
-->
<div class="catalogue">
    <?php
    if(!$recettes) {
    echo '<br>';
    echo "<h3 class='catalogue-titre'>Votre recherche n'a donné aucun résultat </h3>";
    } else {
        echo "<h3 class='catalogue-titre'>$titre </h3>";
    }
    foreach ($recettes as $recette) :
    if(!$fav || !in_array($recette['r_id'], $fav)) {
        $isFav = "";
    } else {
        $isFav = 'isFav';
    }
    if(isset($_GET['search'])) {
        $value = $_GET['search'];
    } else if (isset($_GET['choix'])) {
        $value = $_GET['choix'];
    }
    ?>
        <a href="../views/recette?r=<?= $recette['r_id']; ?>">
            <div class="card" type="<?= $recette['r_type']; ?>">
                <div class="card-thumb">
                    <img src="<?= $recette["p_link"] ?>" alt="test">
                    <div class="card-thumb-fav <?= $isFav ?>">
                        <form class="fav-form" action="../actions/action-favoris.php" method="POST">
                            <input name="current_recette" type="hidden" value="<?= $recette['r_id'] ?>">
                            <input name="from" type="hidden" value="<?= $value ?>">
                            <span name="submit-fav" type="submit" class="fav-check fav-checkbox-icon <?= $isFav ?>"><i class="far fa-heart"></i></span>
                        </form>
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
                        <p><?= $recette["r_content"] ?></p>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="card-footer-date">
                        <p><?= $recette["r_date"] ?></p>
                    </div>
                    <div class="card-footer-user">
                        <p> by <strong><?= $recette["r_createur"] ?></strong></p>
                    </div>
                </div>
            </div>
        </a>
    <?php
    endforeach;
    ?>
</div>
<!-- /CARDS -->

<script>
$('.fav-form').on('click', function(e) {
    e.preventDefault()
    this.submit()
})
</script>

<?php include "../components/footer.php"; ?>