<?php 

if(isset($_POST['submit'])) {

    if(empty($_POST['email'])) {
        $_SESSION['toast']['erreur']['email'] = "Il faut entrer un mail";
    }

    if(empty($_SESSION['toast']['erreur'])){
        require '../components/db.php';

        $req = $pdo->prepare('SELECT n_email FROM mly_newsletter WHERE n_email = :email');
        $req->execute(array(
            ':email' => $_POST['email']
        ));
        $d = $req->fetch();
        $req->closeCursor();
        if($d){
            $_SESSION['toast']['erreur']['existant'] = "Vous êtes déjà inscrit à notre newsletter";
        } else {
            $req = $pdo->prepare('INSERT INTO mly_newsletter SET n_email = :email, n_date = :n_date');
            $req->execute(array(
                ':email' => $_POST['email'],
                ':n_date' => date('Y-m-d')
            ));
            $req->closeCursor();
            $_SESSION['toast']['succes']['newsletter'] = "Vous avez été inscrit avec succès à notre newsletter";
            header('Location: ../views/home.php');
        }
    }
}