<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require '../components/db.php';

//TEMPORAIRE affichange de la recette 1 par défaut (voir comment faire)
if(isset($_GET['r'])) {
    $idRecette = $_GET['r'];
    //Récupération des informations globales des recettes
    $sql = "SELECT r_id, r_nom, r_ingredients, r_content, r_date, r_type, r_createur, r_date, r_difficulte, r_duree
        FROM mly_recettes
        INNER JOIN mly_photos ON r_id = p_recette_id
        WHERE r_id = $idRecette AND r_officielle = 'true'
        GROUP BY r_id, p_link";

    $req = $pdo->prepare($sql);
    $req->execute();
    $data = $req->fetch();
    $req->closeCursor();
} else {
    $sql = "SELECT r_id, r_nom, r_ingredients, r_content, r_date, r_type, r_createur, r_date, r_difficulte, r_duree
        FROM mly_recettes
        INNER JOIN mly_photos ON r_id = p_recette_id
        WHERE r_officielle = 'true'
        GROUP BY r_id, p_link";

        $req = $pdo->prepare($sql);
        $req->execute();
        $data = $req->fetchAll();
        shuffle($data);
        $req->closeCursor();
        $data = $data[0];
        $idRecette = $data['r_id'];
}


//Ici on check s'il y a un résultat, sinon on redirige
if(!$data) {
    echo '<script> window.location.href = "../views/home"</script>';
} else {
    //Récupération des photos
	$req = $pdo->prepare("SELECT p_link FROM mly_photos WHERE p_recette_id = $idRecette");
    $req->execute();
    $thumbs = $req->fetchAll();
    $req->closeCursor();

    //Récupération des commentaires de la recette
    $req = $pdo->prepare("SELECT * FROM mly_commentaires WHERE c_recette_id = $idRecette");
    $req->execute();
    $commentaires = $req->fetchAll();
    $req->closeCursor();

    //Récupération des pseudos
    $req = $pdo->prepare("SELECT * FROM mly_utilisateurs");
    $req->execute();
    $users = $req->fetchAll();
    $req->closeCursor();
    $utilisateurs = array();
    foreach($users as $user) {
        $utilisateurs += [
            $user['u_id'] => [
                'u_id' => $user['u_id'],
                'u_pseudo' => $user['u_pseudo'],
                'u_avatar' => $user['u_avatar']
            ]
        ];
    }

    //Gestion favoris
    $req = $pdo->prepare('SELECT u_fav FROM mly_utilisateurs WHERE u_id = :logged_id');
    $req->execute(array(
        ':logged_id' => $_SESSION['utilisateur']['u_id']
    ));
    $d = $req->fetch();

    $fav = explode(',' , $d['u_fav']);
    if(!$fav || !in_array($idRecette, $fav)) {
        $isFav = "";
    } else {
        $isFav = 'isFav';
    }
}


