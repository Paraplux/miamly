<?php 

if (isset($_POST)) {

    if (empty($_POST['login'])) {
        $_SESSION['toast']['erreur']['login'] = "Le champ login est vide";
    }
    if (empty($_POST['password'])) {
        $_SESSION['toast']['erreur']['password'] = "Le champ password est vide";
    }

    if (empty($_SESSION['toast']['erreur'])) {
        include '../components/db.php';
        $req = $pdo->prepare("SELECT * FROM mly_utilisateurs WHERE u_email = :login OR u_pseudo = :login");
        $req->execute(array(
            ':login' => $_POST['login'],
        ));
        $utilisateur = $req->fetch();
        if($utilisateur == null){
            $_SESSION['toast']['erreur']['password'] = "Logs incorrect";
            echo 'Mauvais logs';
        } else if (password_verify($_POST['password'], $utilisateur['u_password'])) {
            echo 'Vous êtes connecté <br>';
            echo 'Bonjour '.$utilisateur['u_pseudo'];
            $_SESSION['utilisateur'] = $utilisateur;
        } else {
            $_SESSION['toast']['erreur']['password'] = "Logs incorrect";
            echo 'Mauvais logs';
        }
    } else {
        echo 'Problème de champs';
    }
    exit();
}