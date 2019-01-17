<?php
include("../components/db.php");

$sql = 'SELECT r_id, r_nom, r_content, r_date, r_type, r_createur, p_link
        FROM mly_recettes
        INNER JOIN mly_photos ON r_id = p_recette_id
        GROUP BY r_id, p_link
        ORDER BY FIELD(r_type, "Entrée", "Plat", "Dessert"), r_date DESC';

$req = $pdo->prepare($sql);
$req->execute();

$recettes = $req->fetchAll();
$req->closeCursor();

?>

