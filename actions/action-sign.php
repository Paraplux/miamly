<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST)) { 

    if(empty($_POST['email'])) { //erreur
        $_SESSION['toast']['erreur']['email'] = "Le champ mail est vide";
    }
    if (empty($_POST['pseudo'])) { //erreur
        $_SESSION['toast']['erreur']['pseudo'] = "Le champ pseudo est vide";
    }
    if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirmation']) { //erreur
        $_SESSION['toast']['erreur']['password'] = "Le champ mot de passe est vide ou non valide!";
    }
    
    if (empty($_SESSION['toast']['erreur'])) {
        include '../components/db.php';
        $req = $pdo->prepare("INSERT INTO mly_utilisateurs SET u_email = :email, u_pseudo = :pseudo, u_password = :password");
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $req->execute(array(
            ':email' => $_POST['email'],
            ':pseudo' => $_POST['pseudo'],
            ':password' => $password,
        ));
        $_SESSION['toast']['success']['sign'] = "Vous êtes inscrit";
        header('Location: ../views/login.php');
        exit();
    }
}