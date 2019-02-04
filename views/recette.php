<!-- PAGE UNIQUE POUR TOUTES LES RECETTES -->

<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../components/header.php';
include '../components/navbar.php';
include '../models/model-recette.php';
?>

<link rel="stylesheet/less" href="../css/recette.less">
<link rel="stylesheet" href="../css/carousel.css">
<script src="../js/carousel.js" async></script>

<div class="container">
    <?php if(!$data) : ?>
    <h1>Erreur</h1>
    <?php else : ?>
    <div class="main-content">
        <div class="main-content-header">
            <h1 class="main-content-title"><?= $data['r_nom']; ?></h1>
            <div class="main-content-fav">
                <form id="fav-form" action="../actions/action-favoris.php" method="POST">
                    <input name="current_recette" type="hidden" value="<?= $data['r_id'] ?>">
                    <input name="from" type="hidden" value="recette">
                    <span name="submit-fav" type="submit" id="fav-check" class="fav-checkbox-icon <?= $isFav ?>"><i class="far fa-heart"></i></span>
                </form>
            </div>
        </div>
        <?php if(count($thumbs) === 1): ?>
        <div class="main-content-thumbs">
            <img class="content-thumb" src="<?= $thumbs[0]['p_link']; ?>" alt="Photo de <?= $data['r_nom']; ?>">
        </div>
        <?php else : ?>
        <div class="main-content-thumbs" id="carousel-rec">
            <?php foreach($thumbs as $thumb) : ?>
            <img class="content-thumb" src="<?= $thumb['p_link']; ?>" alt="Photo de <?= $data['r_nom']; ?>">
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <div class="main-content-step">
            <ol>
                <?= $data['r_content']; ?>
            </ol>
        </div>
        <br><hr><br>
        <div class="comment">
            <h2 class="comment-subtitle">Commentaires</h2>
            <?php 
            if(!$commentaires) {
                echo "Soyez le premier à réagir à cette recette !";
            }
            foreach($commentaires as $commentaire) : 
            if(!isset($_SESSION['utilisateur']) || $utilisateurs[$commentaire['c_utilisateur_id']]['u_id'] != $_SESSION['utilisateur']['u_id']) {
                $isUser = "";
            } else {
                $isUser = "comment-user";
            }
            ?>
            <div class="comment-auteur">
                <img class="comment-avatar" src="<?= $utilisateurs[$commentaire['c_utilisateur_id']]['u_avatar']; ?>" alt="">
                <div class="comment-pseudo <?= $isUser ?>">
                    <a href="#"><?= $utilisateurs[$commentaire['c_utilisateur_id']]['u_pseudo']; ?></a>
                </div>
            </div>
            <br>
            <div class="comment-corpus">
                <?= $commentaire['c_corpus']; ?>
            </div>
            <div class="comment-date"><?= $commentaire['c_date']; ?></div>
            <hr>
            <?php endforeach; ?>
        </div>
        <br><br>
        <form class="comment-form" action="../actions/action-addcomment.php" method='POST'>
            <h2 class="comment-subtitle">Ajouter un commentaire : </h2>
            <textarea name="commentaire" cols='60' rows='10' placeholder="Avez vous une remarque, une astuce, un commentaire ?"></textarea><br>
            <input name="current_recette" type="hidden" value="<?= $data['r_id'] ?>">
            <input name="submit" type="submit">
        </form>
    </div>

    <div class="side-content">
        <h2 class="side-content-subtitle">Récapitulatif</h2>
        <div class="side-content-ingr">
            <ul>
               <?= $data['r_ingredients'] ?>
            </ul>
        </div>
        <div class="side-content-infos">
            <p>Difficulté : <?= $data['r_difficulte']; ?>/10 - Durée : <?= $data['r_duree']; ?></p>
        </div>
        <div class="side-content-signature"><?= $data['r_date']; ?> / <?= $data['r_createur']; ?></div>
    </div>
    <?php endif; ?>
</div>

<?php 
include '../components/footer.php';
?>

<script>
if(document.querySelector('#carousel-rec')) {
    let onReady = function () {
        
        new Carousel(document.querySelector('#carousel-rec'), {
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
}

var formFav = document.querySelector('#fav-form')
document.querySelector('#fav-check').addEventListener('click', function() {
    formFav.submit()
})
</script>