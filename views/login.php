<?php
include '../components/header.php';
include '../components/navbar.php';
?>

<link rel="stylesheet/less" href="../css/less/form.less">
<link rel="stylesheet/less" href="../css/less/login.less">

<section class="login-page">
    <h2>Connectez vous</h2>

    <form class="mly-form" method="POST" action="../actions/action-login.php">
        <input name="login" type="text" placeholder="Votre mail ou pseudo">
        <input name="password" type="password" placeholder="Mot de passe">
        <input type="submit">
        <br>
        <a class="create-account" href="./sign">Je n'ai pas encore de compte</a>
    </form>
    

    
    <article class="login-content">
        <p>Restez connecté sur Miamly afin de ne rater aucune recettes!</p>
        <p>Vos informations ne seront jamais transmises.</p>
    </article>
</section>

<?php 
include '../components/footer.php';
?>
