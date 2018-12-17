<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<h1>Mon compte</h1>

<p>Votre pseudo : <?= $_SESSION['utilisateur']['u_pseudo'] ?></p>
<p>Votre adresse mail : <?= $_SESSION['utilisateur']['u_email'] ?></p>