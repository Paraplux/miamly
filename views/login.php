<?php
include '../components/header.php';
include '../components/navbar.php';
?>

<link rel="stylesheet" href="../css/login.css">
<link rel="stylesheet" href="../css/form.css">

<div class="container">
    <section class="login-page">


        <form class="mly-form" method="POST" action="../actions/action-login.php">
            <input name="login" type="text" placeholder="Votre mail ou pseudo">
            <input name="password" type="password" placeholder="Mot de passe">
            <input type="submit">
            <br>
            <a class="create-account" href="./sign">Je n'ai pas encore de compte</a>
        </form>
        

        
        <article class="login-content">
            <h1>Connectez vous.</h1>
            <p>Restez connecté sur Miamly afin de ne rater aucune recettes!</p>
            <p>Vos informations ne seront jamais transmises.</p>
        </article>
    </section>
</div>

<?php 
include '../components/footer.php';
?>
