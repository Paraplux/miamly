<?php
include("../components/db.php");
$req = $pdo->prepare('SELECT * FROM mly_recettes');
$req->execute();
$recettes =  $req->fetchAll();
$req->closeCursor();


$req = $pdo->prepare('SELECT * FROM mly_photos');
$req->execute();
foreach($recettes as $recette) {
    $recette['photos'] = $req->fetchAll();

}
$req->closeCursor();
?>