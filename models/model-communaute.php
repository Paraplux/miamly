<?php 
require '../components/db.php';

$req = $pdo->prepare('SELECT u_votes_history FROM mly_utilisateurs WHERE u_id = :logged_id');
$req->execute(array(
    ':logged_id' => $_SESSION['utilisateur']['u_id']
));
$d = $req->fetch();
$compare = $d['u_votes_history'];

//Récupération des recettes de communauté pour lesquelle l'utilisateur n'a pas voté
$req = $pdo->prepare("SELECT r_id, r_nom, r_duree, r_content, r_ingredients, r_difficulte, r_date, r_type, p_link, r_votes FROM mly_recettes INNER JOIN mly_photos ON r_id = p_recette_id WHERE r_officielle = 'false' AND r_id NOT IN ($compare) GROUP BY r_id, p_link");
$req->execute();
$dataUnvoted = $req->fetchAll();
$req->closeCursor();

//Récupération des recettes de communauté pour lesquelles l'utilisateur à déjà voté
$req = $pdo->prepare("SELECT r_id, r_nom, r_duree, r_content, r_ingredients, r_difficulte, r_date, r_type, p_link, r_votes FROM mly_recettes INNER JOIN mly_photos ON r_id = p_recette_id WHERE r_officielle = 'false' AND r_id IN ($compare) GROUP BY r_id, p_link");
$req->execute();
$dataVoted = $req->fetchAll();
$req->closeCursor();