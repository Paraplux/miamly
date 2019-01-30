<?php 
require '../components/db.php';

$req = $pdo->prepare('SELECT * FROM mly_recettes WHERE r_officielle = "false"');
$req->execute();

$data = $req->fetchAll();

$req->closeCursor();