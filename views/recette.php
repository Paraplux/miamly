<!-- PAGE UNIQUE POUR TOUTES LES RECETTES -->

<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../components/header.php';
include '../components/navbar.php';

// TEMPORAIRE HISTOIRE D'AVOIR UN CONTENU
require '../components/db.php';

$sql = 'SELECT r_id, r_nom, r_content, r_date, r_type, r_createur, r_date, r_difficulte, r_duree
        FROM mly_recettes
        INNER JOIN mly_photos ON r_id = p_recette_id
        WHERE r_id = 15
        GROUP BY r_id, p_link';

$req = $pdo->prepare($sql);
$req->execute();
$data = $req->fetch();
$req->closeCursor();

$req = $pdo->prepare('SELECT p_link FROM mly_photos WHERE p_recette_id = 15');
$req->execute();
$thumbs = $req->fetchAll();
$req->closeCursor();
// /TEMPORAIRE
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
        <div class="main-carousel">
            <?php foreach($thumbs as $thumb) : ?>
            <div class="carousel-cell"><img src="<?= $thumb['p_link']; ?>" alt="Photo de <?= $data['r_nom']; ?>"></div>
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
                <li>Ingrédient 1</li>
                <li>Ingrédient 2</li>
                <li>Ingrédient 3</li>
                <li>Ingrédient 4</li>
                <li>Ingrédient 5</li>
            </ul>
        </div>
        <div class="side-content-infos">
            <p>Difficulté : <?= $data['r_difficulte']; ?>/10 - Durée : <?= $data['r_duree']; ?></p>
        </div>
        <div class="side-content-signature"><?= $data['r_date']; ?> / <?= $data['r_createur']; ?></div>
    </div>

</div>

<script>
$(document).ready(function(){
    $('.main-carousel').flickity({
        // options
        wrapAround: true,
        imageLoaded: true
    });
})
</script>

<?php 
include '../components/footer.php';
?>