<!-- PAGE UNIQUE POUR TOUTES LES RECETTES -->

<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../components/header.php';
include '../components/navbar.php';
// include '../controllers/controller-recettes.php';
?>
<link rel="stylesheet" href="../css/recette.css">
<div class="container">

    <div class="main-content">
        <div class="main-content-header">
            <h1 class="main-content-title">Titre de la recette</h1>
            <div class="main-content-note">X X X X X</div>
            <div class="main-content-fav">FAVORIS</div>
        </div>
        <div class="main-content-carousel">
            <img class="carousel-item" src="../images/thumbs/recettes/brownie.jpg" alt="">
        </div>
        <div class="main-content-step">
            <ol>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo architecto qui vero ullam quisquam beatae voluptates. Ratione, suscipit ad molestias officiis minima doloremque. Illo, ratione? Sint perferendis dolore ipsum quisquam.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo architecto qui vero ullam quisquam beatae voluptates. Ratione, suscipit ad molestias officiis minima doloremque. Illo, ratione? Sint perferendis dolore ipsum quisquam.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo architecto qui vero ullam quisquam beatae voluptates. Ratione, suscipit ad molestias officiis minima doloremque. Illo, ratione? Sint perferendis dolore ipsum quisquam.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo architecto qui vero ullam quisquam beatae voluptates. Ratione, suscipit ad molestias officiis minima doloremque. Illo, ratione? Sint perferendis dolore ipsum quisquam.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo architecto qui vero ullam quisquam beatae voluptates. Ratione, suscipit ad molestias officiis minima doloremque. Illo, ratione? Sint perferendis dolore ipsum quisquam.</li>
            </l>
        </div>
        <br><hr><br>x
        <div class="main-content-comment">
            <h2 class="main-content-subtitle">Commentaires</h2>
            <div class="main-content-auteur">
                <img class="main-content-avatar" src="../hw_ressources/avatar.png" alt="">
                <div class="main-content-pseudo">Ginette</div>
            </div>
            <hr>
            <div class="main-content-corpus">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem blanditiis pariatur rem debitis at perspiciatis consequuntur deleniti saepe, quae, neque rerum reiciendis cumque veritatis aut architecto atque expedita voluptas? Consectetur.Voluptatem, unde? Atque iste maxime hic cum ipsum, mollitia suscipit laborum quasi. Possimus veniam reiciendis perferendis, ipsum dolorem iste accusamus excepturi eligendi harum nobis ea? A repudiandae cum et excepturi!
            </div>
            <div class="main-content-date">DATE</div>
        </div>
        <br><hr><br>
        <form class="comment-form" action="">
            <h2 class="main-content-subtitle">Ajouter un commentaire : </h2>
            <textarea name="" cols='60' rows='10' placeholder="Avez vous une remarque, une astuce, un commentaire ?"></textarea><br>
            <input type="submit">
        </form>
    </div>

    <div class="side-content">
        <h2 class="main-content-subtitile">Récapitulatif</h2>
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
            <p>Diffculté / Note / Calories / Date</p>
        </div>
        <div class="side-content-signature">DATE / CREATEUR</div>
    </div>

</div>

<?php 
include '../components/footer.php';
?>