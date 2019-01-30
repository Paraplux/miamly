<?php
require '../components/db.php';

$req = $pdo->prepare('SELECT r_votes FROM mly_recettes WHERE r_id = :current_id');
$req->execute(array(
    ':current_id' => $_POST['current_id']
));
$d = $req->fetch();
$current_votes = $d['r_votes'];
$req->closeCursor();


if(isset($_POST['up'])){
    $new_votes = $current_votes + 1;
    if($new_votes < 100) {
        $req = $pdo->prepare('UPDATE mly_recettes SET r_votes = :new_votes WHERE r_id = :current_id');
        $req->execute(array(
            ':current_id' => $_POST['current_id'],
            ':new_votes' => $new_votes
        ));
        $req->closeCursor();
    } else if ($new_votes == 100) {
        $req = $pdo->prepare('UPDATE mly_recettes SET r_votes = :new_votes, r_officielle = "true" WHERE r_id = :current_id');
        $req->execute(array(
            ':current_id' => $_POST['current_id'],
            ':new_votes' => $new_votes
        ));
        $req->closeCursor();
    }
    
}

if(isset($_POST['down'])){
    $new_votes = $current_votes - 1;
    if($new_votes > 0) {
        $req = $pdo->prepare('UPDATE mly_recettes SET r_votes = :new_votes WHERE r_id = :current_id');
        $req->execute(array(
            ':current_id' => $_POST['current_id'],
            ':new_votes' => $new_votes
        ));
        $req->closeCursor(); 
    } else if ($new_votes == 0) {
        /*SUPPRESSION DES PHOTOS DANS LES DOSSIERS*/
        $req = $pdo->prepare('SELECT * FROM mly_photos WHERE p_recette_id = :current_id');
        $req->execute(array(
            ':current_id' => $_POST['current_id']
        ));
        $d = $req->fetch();
        $req->closeCursor();
        foreach($d as $k) {
            unlink($k['p_link']);
        }

        /*SUPPRESSION DES PHOTOS DANS LA BDD*/
        $req = $pdo->prepare('DELETE FROM mly_photos WHERE p_recette_id = :current_id');
        $req->execute(array(
            ':current_id' => $_POST['current_id']
        ));
        $req->closeCursor();

        /*SUPPRESION DE LA RECETTE*/
        $req = $pdo->prepare('DELETE FROM mly_recettes WHERE r_id = :current_id');
        $req->execute(array(
            ':current_id' => $_POST['current_id']
        ));
        $req->closeCursor();
    }
}


header('Location: ../views/communaute.php');