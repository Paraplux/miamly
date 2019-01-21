<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../components/header.php';
include '../components/navbar.php';


?>

<link rel="stylesheet/less" href="../css/form.less">
<link rel="stylesheet/less" href="../css/account.less">

<div class="account">
    <div class="informations">
        <h2>Vos informations</h2>
        <form class="mly-form" action="../actions/action-informations.php" method='POST' enctype="multipart/form-data">

            <label for="">Votre adresse mail :</label><br>
            <input name="email" type="email" 
            value="<?= isset($_SESSION['utilisateur']) ? $_SESSION['utilisateur']['u_email'] : "";?>"><br>

            <label for="">Votre pseudo :</label><br>
            <input name="pseudo" type="text" 
            value="<?=isset($_SESSION['utilisateur']) ? $_SESSION['utilisateur']['u_pseudo'] : "";?>"><br>

            <label for="">Votre avatar :</label><br>
            <input name="avatar" type="file"><br>
            <div>Avatar actuel :</div><br>
            <img src="<?= $_SESSION['utilisateur']['u_avatar'] ?>" alt=""><br><br><br>

            <label for="">Votre prénom :</label><br>
            <input name="prenom" type="text" 
            value="<?=isset($_SESSION['utilisateur']) ? $_SESSION['utilisateur']['u_prenom'] : "";?>"><br>

            <label for=>Votre nom :</label><br>
            <input name="nom" type="text"
            value="<?=isset($_SESSION['utilisateur']) ? $_SESSION['utilisateur']['u_nom'] : "";?>"><br>

            <label for="">Votre âge :</label><br>
            <input name="age" type="text" 
            value="<?=isset($_SESSION['utilisateur']) ? $_SESSION['utilisateur']['u_age'] : "";?>"><br>

            <label for="">Votre plat préféré :</label><br>
            <input name="recettefavorite" type="text" 
            value="<?=isset($_SESSION['utilisateur']) ? $_SESSION['utilisateur']['u_recettefavorite'] : "";?>"><br>

            <label for="">Votre ingrédient préféré :</label><br>
            <input name="ingredientfavoris" type="text" 
            value="<?=isset($_SESSION['utilisateur']) ? $_SESSION['utilisateur']['u_ingredientfavoris'] : "";?>"><br>

            <label for="">La recette de vos rêves :</label><br>
            <input name="recettedereve" type="text" 
            value="<?=isset($_SESSION['utilisateur']) ? $_SESSION['utilisateur']['u_recettedereve'] : "";?>"><br>

            <input type="submit" value="Modifier"><br>

        </form>
        <a href="./logout.php">Se déconnecter</a>
    </div>
    <div class="changepassword">
        <h2>Modifier votre mot de passe</h2>
        <form class="mly-form" method="POST" action="../actions/action.changepassword.php">

            <label for="">Nouveau mot de passe :</label><br>
            <input name="password_new" type="password"><br>

            <label for="">Confirmation du mot de passe :</label><br>
            <input name="password_confirmation" type="password"><br>

            <input type="submit" value="Modifier mon mot de passe"><br>
        </form>
    </div>
</div>


<?php 
include '../components/footer.php';
?>