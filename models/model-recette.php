<?php
require '../components/db.php';
$idRecette = isset($_GET['r']) ? $_GET['r'] : "1";
$sql = "SELECT r_id, r_nom, r_ingredients, r_content, r_date, r_type, r_createur, r_date, r_difficulte, r_duree
        FROM mly_recettes
        INNER JOIN mly_photos ON r_id = p_recette_id
        WHERE r_id = $idRecette AND r_officielle = 'true'
        GROUP BY r_id, p_link";

$req = $pdo->prepare($sql);
$req->execute();
$data = $req->fetch();
$req->closeCursor();

if(!$data) {
    echo '<script> window.location.href = "../views/home"</script>';
} else {
	$req = $pdo->prepare("SELECT p_link FROM mly_photos WHERE p_recette_id = $idRecette");
    $req->execute();
    $thumbs = $req->fetchAll();
    $req->closeCursor();
}


