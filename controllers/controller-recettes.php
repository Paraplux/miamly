<?php
include("../components/db.php");

$sql = 'SELECT *
        FROM mly_recettes
        LEFT JOIN mly_photos ON mly_recettes.r_id = mly_photos.p_recette_id';
        
$req = $pdo->prepare($sql);
$req->execute();

$recettes = $req->fetchAll();

$req->closeCursor();
?>