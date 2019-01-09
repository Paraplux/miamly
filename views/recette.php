<!-- PAGE UNIQUE POUR TOUTES LES RECETTES -->

<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../components/header.php';
include '../components/navbar.php';
?>
<link rel="stylesheet" href="../css/recette.css">
<div class="container">

    <div class="main-content">
        <div class="main-content-header">
            <h1 class="main-content-title">Titre de la recette</h1>
            <div class="main-content-fav">
                <label class="fav-checkbox">
                    <input type="hidden" name="fax" value="False" />
                    <input class="fav-checkbox-input" name="alarm" value="True" type="checkbox">
                    <span class="fav-checkbox-icon"><i class="far fa-heart"></i></span>
                </label>
            </div>
        </div>
        <div class="main-carousel">
            <div class="carousel-cell"><img src="../images/thumbs/recettes/brownie.jpg" alt="Photo de Brownie"></div>
            <div class="carousel-cell"><img src="../images/thumbs/recettes/brownie.jpg" alt="Photo de Brownie"></div>
            <div class="carousel-cell"><img src="../images/thumbs/recettes/brownie.jpg" alt="Photo de Brownie"></div>
            <div class="carousel-cell"><img src="../images/thumbs/recettes/brownie.jpg" alt="Photo de Brownie"></div>
            <div class="carousel-cell"><img src="../images/thumbs/recettes/brownie.jpg" alt="Photo de Brownie"></div>
        </div>
        <div class="main-content-step">
            <ol>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo architecto qui vero ullam quisquam beatae voluptates. Ratione, suscipit ad molestias officiis minima doloremque. Illo, ratione? Sint perferendis dolore ipsum quisquam.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo architecto qui vero ullam quisquam beatae voluptates. Ratione, suscipit ad molestias officiis minima doloremque. Illo, ratione? Sint perferendis dolore ipsum quisquam.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo architecto qui vero ullam quisquam beatae voluptates. Ratione, suscipit ad molestias officiis minima doloremque. Illo, ratione? Sint perferendis dolore ipsum quisquam.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo architecto qui vero ullam quisquam beatae voluptates. Ratione, suscipit ad molestias officiis minima doloremque. Illo, ratione? Sint perferendis dolore ipsum quisquam.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo architecto qui vero ullam quisquam beatae voluptates. Ratione, suscipit ad molestias officiis minima doloremque. Illo, ratione? Sint perferendis dolore ipsum quisquam.</li>
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
            <p>Facile / 1500 kcal</p>
        </div>
        <div class="side-content-signature">09-12-2018 / Antoine</div>
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