<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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
        $req->closeCursor();
        if($utilisateur == null){
            $_SESSION['toast']['erreur']['password'] = "Vos informations de connexion sont incorrects";
            header('Location: ../views/login.php');
        } else if (password_verify($_POST['password'], $utilisateur['u_password'])) {
            $_SESSION['utilisateur'] = $utilisateur;
            $_SESSION['toast']['success']['sign'] = "Vous êtes connecté";
            header('Location: ../views/account.php');
        } else {
            $_SESSION['toast']['erreur']['password'] = "Vos informations de connexion sont incorrects";
            header('Location: ../views/login.php');
        }
    } else {
        $_SESSION['toast']['erreur']['password'] = "Vos champs de connexion sont mal remplis";
        header('Location: ../views/login.php');
    }
}