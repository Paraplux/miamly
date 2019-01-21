<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST)){

    if (empty($_POST['password_new']) || $_POST['password_new'] != $_POST['password_confirmation']) {
        $_SESSION['toast']['erreur']['password'] = "Le champ mot de passe est vide ou non valide!";
    }
    
    if(empty($_SESSION['toast'])){
        require '../components/db.php';
        
        $password = password_hash($_POST['password_new'], PASSWORD_BCRYPT);
        $req = $pdo->prepare('UPDATE mly_utilisateurs SET u_password = :u_password WHERE u_id = :u_id');
        $req->execute(array(
            ':u_password' => $password,
            ':u_id' => $_SESSION['utilisateur']['u_id']
        ));
        $_SESSION['toast']['success']['password'] = "Le mot de passe a été changé avec success!";
        header('Location: ../views/account.php');
    } else {
        $_SESSION['toast']['erreur']['password'] = "Erreur! Veuillez essayer à nouveau!";
        header('Location: ../views/account.php');
    }
}