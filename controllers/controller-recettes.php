<?php
include '../components/db.php';

$requete = $pdo->prepare('SELECT * FROM mly_recettes');
$requete->execute();

$recettes = $requete->fetchAll();