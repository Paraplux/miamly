<?php

if (session_status() == PHP_SESSION_NONE) {
session_start();
}

include './components/header.php';
include './components/navbar.php';
?>

<link rel="stylesheet" href="./css/carousel.css">
<script src="./js/carousel.js" async></script>


<div class="container">

    <div id="carousel1">
        <div class="item">
            <img src="./images/thumbs/recettes/thumb_38a863400f561953889ae8ea512276ef6c0d403c.jpg" alt="">
        </div>
        <div class="item">
            <img src="./images/thumbs/recettes/thumb_6a55acf4909b9cd9c94e39f87c4dbde175ad622d.jpg" alt="">
        </div>
        <div class="item">
            <img src="./images/thumbs/recettes/thumb_223c20d359449da3ca115e377a96e72fde2c9b59.jpg" alt="">
        </div>
        <div class="item">
            <img src="./images/thumbs/recettes/tartiflette.jpg" alt="">
        </div>
        <div class="item">
            <img src="./images/thumbs/recettes/champ.JPG" alt="">
        </div>
    </div>

    <div id="carousel2">
        <div class="item">
            <img src="./images/thumbs/recettes/thumb_38a863400f561953889ae8ea512276ef6c0d403c.jpg" alt="">
        </div>
        <div class="item">
            <img src="./images/thumbs/recettes/thumb_6a55acf4909b9cd9c94e39f87c4dbde175ad622d.jpg" alt="">
        </div>
        <div class="item">
            <img src="./images/thumbs/recettes/thumb_223c20d359449da3ca115e377a96e72fde2c9b59.jpg" alt="">
        </div>
        <div class="item">
            <img src="./images/thumbs/recettes/tartiflette.jpg" alt="">
        </div>
        <div class="item">
            <img src="./images/thumbs/recettes/champ.JPG" alt="">
        </div>
    </div>

    <div id="carousel3">
        <div class="item">
            <img src="./images/thumbs/recettes/thumb_38a863400f561953889ae8ea512276ef6c0d403c.jpg" alt="">
        </div>
        <div class="item">
            <img src="./images/thumbs/recettes/thumb_6a55acf4909b9cd9c94e39f87c4dbde175ad622d.jpg" alt="">
        </div>
        <div class="item">
            <img src="./images/thumbs/recettes/thumb_223c20d359449da3ca115e377a96e72fde2c9b59.jpg" alt="">
        </div>
        <div class="item">
            <img src="./images/thumbs/recettes/tartiflette.jpg" alt="">
        </div>
        <div class="item">
            <img src="./images/thumbs/recettes/champ.JPG" alt="">
        </div>
    </div>

    <div id="carousel4">
        <div class="item">
            <img src="./images/thumbs/recettes/thumb_38a863400f561953889ae8ea512276ef6c0d403c.jpg" alt="">
        </div>
        <div class="item">
            <img src="./images/thumbs/recettes/thumb_6a55acf4909b9cd9c94e39f87c4dbde175ad622d.jpg" alt="">
        </div>
        <div class="item">
            <img src="./images/thumbs/recettes/thumb_223c20d359449da3ca115e377a96e72fde2c9b59.jpg" alt="">
        </div>
        <div class="item">
            <img src="./images/thumbs/recettes/tartiflette.jpg" alt="">
        </div>
        <div class="item">
            <img src="./images/thumbs/recettes/champ.JPG" alt="">
        </div>
    </div>

</div>


<?php 
include './components/footer.php';
?>