<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>


<link rel="stylesheet" href="../css/account-popup.css">

<nav class="account-nav">
    <div class="account-title">
        <?php if(isset($_SESSION['utilisateur'])) : ?>
            Mon compte
        <?php else : ?>
            Connectez vous
        <?php endif; ?>
    </div>
    <div class="account-corpus">
        <?php if(isset($_SESSION['utilisateur'])): ?>
        <a href="../views/account">Voir mon compte</a>
        <a href="../views/logout">Se déconnecter</a>
        <?php else : ?>
        <a href="../views/login">Se connecter</a>
        <a href="../views/sign">S'inscrire</a>
        <?php endif; ?>
    </div>
</nav>

<script src="../js/account.js"></script>