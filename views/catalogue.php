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
    $searchFor = $_GET['search'];
} else if (isset($_GET['choix'])) {
    
    $searchFor = "";
    require '../models/model-choix.php';

} else {
    echo '<script> window.location.href = "../views/home"</script>';
}
?>
<link rel="stylesheet/less" href="../css/less/catalogue.less">
<link rel="stylesheet/less" href="../css/less/cards.less">

<div class="catalogue">
    <?php
    if(!$recettes) {
    echo '<br>';
    echo "<h3 class='catalogue-titre'>Votre recherche n'a donné aucun résultat </h3>";
    } else {
        echo "<h3 class='catalogue-titre'>$titre $searchFor</h3>";
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