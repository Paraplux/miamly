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

<div class="container">

    <div class="main-content">
        <div class="main-content-header">
            <h1 class="main-content-title"><?= $data['r_nom']; ?></h1>
            <div class="main-content-fav">
                <label class="fav-checkbox">
                    <input type="hidden" name="fax" value="False" />
                    <input class="fav-checkbox-input" name="alarm" value="True" type="checkbox">
                    <span class="fav-checkbox-icon"><i class="far fa-heart"></i></span>
                </label>
            </div>
        </div>
        <div class="main-gallery">
            <?php foreach($thumbs as $thumb) : ?>
            <img class="gallery-cell" src="<?= $thumb['p_link']; ?>" alt="Photo de <?= $data['r_nom']; ?>">
            <img class="gallery-cell" src="<?= $thumb['p_link']; ?>" alt="Photo de <?= $data['r_nom']; ?>">
            <?php endforeach; ?>
        </div>
        <div class="main-content-step">
            <ol>
                <?= $data['r_content']; ?>
            </ol>
        </div>
        <br><hr><br>
        <div class="comment">
            <h2 class="comment-subtitle">Commentaires</h2>
            <div class="comment-auteur">
                <img class="comment-avatar" src="../hw_ressources/avatar.png" alt="">
                <div class="comment-pseudo">Ginette</div>
            </div>
            <hr>
            <div class="comment-corpus">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem blanditiis pariatur rem debitis at perspiciatis consequuntur deleniti saepe, quae, neque rerum reiciendis cumque veritatis aut architecto atque expedita voluptas? Consectetur.Voluptatem, unde? Atque iste maxime hic cum ipsum, mollitia suscipit laborum quasi. Possimus veniam reiciendis perferendis, ipsum dolorem iste accusamus excepturi eligendi harum nobis ea? A repudiandae cum et excepturi!
            </div>
            <div class="comment-date">01/12/2018</div>
        </div>
        <br><hr><br>
        <form class="comment-form" action="">
            <h2 class="comment-subtitle">Ajouter un commentaire : </h2>
            <textarea name="" cols='60' rows='10' placeholder="Avez vous une remarque, une astuce, un commentaire ?"></textarea><br>
            <input type="submit">
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

</div>

<?php 
include '../components/footer.php';
?>

<script>
$('.main-gallery').flickity({
  // options
  imagesLoaded: true,
  wrapAround: true
});
</script>


<div step="1" class="parent-1">
    <p class="enfant-1"></p>
    <p class="enfant-2"></p>
    <p class="enfant-3"></p>
</div>
<div class="parent-2">
    <p class="enfant-1"></p>
    <p class="enfant-2"></p>
    <p class="enfant-3"></p>
</div>
<div class="parent-3">
    <p class="enfant-1"></p>
    <p class="enfant-2"></p>
    <p class="enfant-3"></p>
</div>
<button type="submit"></button>