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
        <form class="mly-form" action="../actions/action-informations.php" method='POST'>
            <label for="">Votre adresse mail :</label><br>
            <input name="email" type="email" 
            value="<?= isset($_SESSION['utilisateur']) ? $_SESSION['utilisateur']['u_email'] : "";?>"><br>

            <label for="">Votre pseudo :</label><br>
            <input name="pseudo" type="text" 
            value="<?=isset($_SESSION['utilisateur']) ? $_SESSION['utilisateur']['u_pseudo'] : "";?>"><br>

            <label for="">Nouveau mot de passe :</label><br>
            <input name="password" type="password"><br>

            <label for="">Votre avatar :</label><br>
            <input type="text" 
            value="<?=isset($_SESSION['utilisateur']) ? $_SESSION['utilisateur']['u_avatar'] : "";?>"><br>

            <br> <br> <br>

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
    <div class="add-recette">
        <h2>Proposer une recette</h2>
        <form class="mly-form" action="../actions/action-addrecette.php" method="POST" enctype="multipart/form-data">
            <label for="">Titre de votre recette :</label><br>
            <input name="nom" type="text"><br>

            <input name="photos[]" type="file" multiple>

            <div class="form-group">
                <label for="">Type de recette :</label><br>
                <select name="typerecette">
                    <option value="Entrée">Entrée</option>
                    <option value="Plat">Plat</option>
                    <option value="Dessert">Dessert</option>
                </select><br>
            </div>
            
            <div class="form-group">
                <label for="">Difficulté : </label><br>
                <input name="difficulte" type="range" min="1" max="10"><br>
            </div>

            <div class="form-group">
                <label for="">Durée : </label><br>
                <select name="duree" >
                    <option value="Rapide">Rapide</option>
                    <option value="Moyenne">Moyenne</option>
                    <option value="Longue">Longue</option>
                </select><br>
            </div>

            <div class="form-group">
                <label for="">Proposer en tant que : </label><br>
                <input name="createur" readonly type="text" value="<?= $_SESSION['utilisateur']['u_pseudo'] ?>"><br>
            </div>

            <label for="">Déroulé de la recette</label><br>
            <div class="step-container">
                <div class="number" step=1>
                    1
                </div>
                <textarea name="step[]" class="step"></textarea>
                <div class="more" step=1>
                    <i class="fas fa-plus"></i>
                </div>
            </div>

            <input class="button-submit" type="submit" value="Proposer"><br>
        </form>
    </div>
</div>

<script src="../js/account.js"></script>
<?php 
include '../components/footer.php';
?>