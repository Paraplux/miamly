<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST)) { 

    include '../components/db.php';

    $sql = "UPDATE mly_utilisateurs
            SET u_pseudo = :pseudo,
                u_prenom = :prenom,
                u_nom = :nom,
                u_age = :age,
                u_recettefavorite = :recettefavorite,
                u_ingredientfavoris = :ingredientfavoris,
                u_recettedereve = :recettedereve
            WHERE u_email = :email";

    $req = $pdo->prepare($sql);

    $req->execute(array(
        ':email' => $_POST['email'],
        ':pseudo' => $_POST['pseudo'],
        ':prenom' => $_POST['prenom'],
        ':nom' => $_POST['nom'],
        ':age' => $_POST['age'],
        ':recettefavorite' => $_POST['recettefavorite'],
        ':ingredientfavoris' => $_POST['ingredientfavoris'],
        ':recettedereve' => $_POST['recettedereve']
    ));
    $req->closeCursor();

    /*On rafraîchit les infos dans la session*/
    $req = $pdo->prepare("SELECT * FROM mly_utilisateurs WHERE u_email = :email");
    $req->execute(array(
        ':email' => $_POST['email'],
    ));
    $utilisateur = $req->fetch();
    $_SESSION['utilisateur'] = $utilisateur;

    /*Message de succès*/
    $_SESSION['toast']['success']['sign'] = "Vos informations ont bien été changées";
    
    /*Redirection*/
    header('Location: ../views/account.php');
    exit();
}