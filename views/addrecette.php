<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../components/header.php';
include '../components/navbar.php';


?>

<link rel="stylesheet/less" href="../css/form.less">
<link rel="stylesheet/less" href="../css/addrecette.less">
<div class="add-recette">
    <form class="mly-form" action="../actions/action-addrecette.php" method="POST" enctype="multipart/form-data">
        <h2>Proposer une recette</h2>
        <div class="inforecette">
            <label for="">Titre de votre recette :</label><br>
            <input name="nom" type="text"><br>
    
            <div class="form-group">
                <label for="">Type de recette :</label><br>
                <select name="typerecette">
                    <option value="Entrée">Entrée</option>
                    <option value="Plat">Plat</option>
                    <option value="Dessert">Dessert</option>
                </select><br>
            </div>
            
            <div class="form-group">
                <label for="">Difficulté : <span id="difficulteValue">5</span>/10 </label><br>
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
            <div class="tags">
                <label for="">Tags :</label><br>
                <div class="validated-tags"></div>
                <input id="taginput" name="taginput" type="text">
                <button id="addtag">Ajouter un tag</button>
            </div>
        </div>

        <div class="deroulerecette">

            <label for="">Ajoutez des photos à votre recette :</label><br>
            <input name="photos[]" type="file" multiple><br>
    
            <label for="">Listez ici les ingrédients :</label><br>
            <div class="ing-container">
                <div class="ing-number" step=1>
                    1
                </div>
                <input name="ing[]" class="ing">
                <div class="ing-more" step=1>
                    <i class="fas fa-plus"></i>
                </div>
            </div>

            <label for="">Déroulé de la recette</label><br>
            <div class="step-container">
                <div class="step-number" step=1>
                    1
                </div>
                <textarea name="step[]" class="step"></textarea>
                <div class="step-more" step=1>
                    <i class="fas fa-plus"></i>
                </div>
            </div>
        </div>

        <input class="button-submit" type="submit" value="Proposer"><br>
    </form>
</div>

    <script src="../js/addrecette.js"></script>
<?php 
include '../components/footer.php';
?>