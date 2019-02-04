<?php
include '../components/header.php';
include '../components/navbar.php';
?>

<div class="container">
    <section class="sign-page">
        
        <h2>Inscrivez vous!</h2>

        <form class="mly-form" method="POST" action="../actions/action-sign.php">
            <input name="email" type="email" placeholder="Votre mail"><br>
            <input name="pseudo" type="text" placeholder="Pseudo"><br>
            <input name="password" type="password" placeholder="Mot de passe"><br>
            <input name="password_confirmation" type="password" placeholder="Confirmation de mot de passe"><br>
            <input type="submit"><br>
        </form>


        <article class="sign-content">
            <p>Vous inscrire sur Miamly c'est l'assurance de ne rater aucunes actualités savoureuses et aucunes recettes.</p>
            <p>Le compte Miamly permet de converver vos recettes préférées, ainsi que suivre celles de vos amis, n'attendez pas, rejoingnez nous, et commencez dès maintenant à créer vos propres recettes grasses et gouteuses!</p>
            <p>Vos informations ne seront jamais transmises.</p>
        </article>
    </section>
</div>

<?php 
include '../components/footer.php';
?>