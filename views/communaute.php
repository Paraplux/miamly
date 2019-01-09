<?php

if (session_status() == PHP_SESSION_NONE) {
session_start();
}

include '../components/header.php';
include '../components/navbar.php';
// include '../controllers/controller-recettes.php';
?>
<link rel="stylesheet" href="../css/card2.css">
<br><br>
<div class="container">
    
    <div class="recette-comm">
        <div class="photo-comm"><img src="../images/thumbs/recettes/fondant.jpg"  class="image_stats"></div>    
        <div class="resume-comm"><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae accusantium error, fuga, reiciendis, eos excepturi commodi dolore enim architecto aliquid necessitatibus veritatis aut quis quae voluptatem? Sunt nesciunt repellat accusamus!</p></div>
        <div class="note"><p>Daniel</p></div>
        <div class="xp_bar">
        <div class="outer">
  <div class="xp-bar" style="width:40%"></div>
</div>
        </div>
    </div>

<?php 
include '../components/footer.php';
?>