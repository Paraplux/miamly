<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST['up']) || isset($_POST['down'])) {
    require '../components/db.php';

    $req = $pdo->prepare('SELECT r_votes FROM mly_recettes WHERE r_id = :current_id');
    $req->execute(array(
        ':current_id' => $_POST['current_id']
    ));
    $d = $req->fetch();
    $current_votes = $d['r_votes'];
    $req->closeCursor();


    //Vote UP
    if(isset($_POST['up'])){

        //Mécanisme de vote (si === 100 switch de la clé r_officielle à true)
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

    //Vote DOWN 
    if(isset($_POST['down'])){
        //Mécanisme de vote (si === 0 on supprime la recette de la bdd et ses photos)
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

    //Mécanisme d'empêchement de vote double
    //On récup la chaine dans bdd qu'on convertit en array

    $req = $pdo->prepare('SELECT u_votes_history FROM mly_utilisateurs WHERE u_id = :logged_id');
    $req->execute(array(
        ':logged_id' => $_SESSION['utilisateur']['u_id']
    ));
    $stringVote = $req->fetch();
    $req->closeCursor();

    if(!$stringVote['u_votes_history']) {
        $arrayVote = array();
        array_push($arrayVote, $_POST['current_id']);
        $stringVote = implode(',' , $arrayVote);
    } else {
        $arrayVote = explode(',' , $stringVote['u_votes_history']);
        array_push($arrayVote, $_POST['current_id']);
        $stringVote = implode(',' , $arrayVote);
    }

    $req = $pdo->prepare('UPDATE mly_utilisateurs SET u_votes_history = :stringVote WHERE u_id = :logged_id');
    $req->execute(array(
        ':logged_id' => $_SESSION['utilisateur']['u_id'],
        ':stringVote' => $stringVote
    ));
    $req->closeCursor();
    //Redirection
    header('Location: ../views/communaute.php');
}