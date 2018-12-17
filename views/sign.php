<?php
include '../components/header.php';
include '../components/navbar.php';
?>

<link rel="stylesheet" href="../css/sign.css">

<div class="container">
    <section class="sign-page">
        <form class="sign-form" method="POST" action="../actions/action-sign.php">
            <input name="email" type="email" placeholder="Votre mail"><br>
            <input name="pseudo" type="text" placeholder="Pseudo"><br>
            <input name="password" type="password" placeholder="Mot de passe"><br>
            <input name="password_confirmation" type="password" placeholder="Confirmation de mot de passe"><br>
            <input type="submit"><br>
        </form>
        <article class="sign-content">
            <h1>Blabla</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum odio ex reiciendis, culpa quos voluptate, expedita, corporis eveniet quia atque placeat necessitatibus tempore architecto officia nulla laudantium iste unde! Aliquid.
            Ipsum totam doloribus, facilis vel sunt aut inventore officiis id a sint aliquam vero non numquam consequuntur optio esse voluptates rem sit. Maiores sit quis velit pariatur in? Quasi, quae.</p>
        </article>
    </section>
</div>

<?php 
include '../components/footer.php';
?>