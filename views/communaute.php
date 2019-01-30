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
  <div class="img-recette"> </div>
  <div class="nom-recette"> </div>
  <div class="outer">
  <div class="xp-bar" style="width:10%"></div>
</div>
<?php 
include '../components/footer.php';
?>