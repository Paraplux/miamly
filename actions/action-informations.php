<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST)) { 

    require '../components/db.php';
    require '../components/class.upload.php';
    if(empty($_POST['avatar_old'])) {
        $avatar = new Upload($_FILES['avatar']);
            if ($avatar->uploaded) {
                $avatarsha1 = 'avatar_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
                $avatar->file_new_name_body = $avatarsha1;
                $avatar->image_resize = true;
                $avatar->image_x = 160;
                $avatar->image_y = 160;
                $avatar->image_convert = 'jpg';
                $avatar->image_ratio_crop = true;
                $avatar->Process('../images/avatars');
                $avatarlink = '../images/avatars/' . $avatarsha1 . '.jpg';
                if ($avatar->processed) {
                    $avatar->Clean();
                }
            }
    } else if (isset($_FILES['avatar']) && $_FILES['avatar'] != $_SESSION['utilisateur']['u_avatar']){
        unlink($_POST['avatar_old']);
        $avatar = new Upload($_FILES['avatar']);
            if ($avatar->uploaded) {
                $avatarsha1 = 'avatar_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
                $avatar->file_new_name_body = $avatarsha1;
                $avatar->image_resize = true;
                $avatar->image_x = 160;
                $avatar->image_y = 160;
                $avatar->image_convert = 'jpg';
                $avatar->image_ratio_crop = true;
                $avatar->Process('../images/avatars');
                $avatarlink = '../images/avatars/' . $avatarsha1 . '.jpg';
                if ($avatar->processed) {
                    $avatar->Clean();
                }
            }
    } else {
        $avatarlink = $_POST['avatar_old'];
    }
        

    $sql = "UPDATE mly_utilisateurs
            SET u_pseudo = :pseudo,
                u_avatar = :avatar,
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
        ':avatar' => $avatarlink,
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