<?php
include("../components/db.php");
$req = $pdo->prepare('SELECT * FROM mly_recettes');
$req->execute();
$recettes =  $req->fetchAll();
$req->closeCursor();

?>