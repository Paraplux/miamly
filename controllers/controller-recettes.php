<?php
include("../components/db.php");

$sql = 'SELECT mly_recettes.r_id, mly_recettes.r_type, mly_recettes.r_nom, mly_recettes.r_content, mly_recettes.r_date, mly_recettes.r_createur, mly_photos.p_link
        FROM mly_recettes
        INNER JOIN mly_photos ON mly_recettes.r_id = mly_photos.p_recette_id
        GROUP BY mly_recettes.r_id, mly_photos.p_link';
        
$req = $pdo->prepare($sql);
$req->execute();

$recettes = $req->fetchAll();

$req->closeCursor();
?>