<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST)) {
    $idRecette = $_POST['current_recette'];
    $idUtilisateur = $_SESSION['utilisateur']['u_id'];
    //En deux temps, d'abord on doit savoir le statut du fav
        require '../components/db.php';
        $req = $pdo->prepare('SELECT u_fav FROM mly_utilisateurs WHERE u_id = :logged_id');
        $req->execute(array(
            ':logged_id' => $idUtilisateur
        ));
        $stringFav = $req->fetch();
        $req->closeCursor();

        if(!$stringFav['u_fav']) {
            $arrayFav = array();
            array_push($arrayFav, $idRecette);
            $stringFav = implode(',' , $arrayFav);
        } else {
            $arrayFav = explode(',' , $stringFav['u_fav']);
            //si l'id est déjà présent, on return
            if(in_array($idRecette, $arrayFav)) {
                $unFav = array($idRecette);
                $arrayFav = array_diff($arrayFav, $unFav);
                $stringFav = implode(',' , $arrayFav);
            } else {
                array_push($arrayFav, $idRecette);
                $stringFav = implode(',' , $arrayFav);
            }
        }

        $req = $pdo->prepare('UPDATE mly_utilisateurs SET u_fav = :stringFav WHERE u_id = :logged_id');
        $req->execute(array(
            ':logged_id' => $idUtilisateur,
            ':stringFav' => $stringFav
        ));
        $req->closeCursor();
        $_SESSION['toast']['success']['favoris'] = 'La recette a bien été ajouté à vos favoris !';
        //Redirection
        if($_POST['from'] === 'recette'){
            $currentUrl = "../views/recette?r=$idRecette";
            header("Location: $currentUrl");
        } else if ($_POST['from'] === 'easy') {
            header("Location: ../views/catalogue?choix=easy");
        } else if ($_POST['from'] === 'best') {
            header("Location: ../views/catalogue?choix=best");
        } else if ($_POST['from'] === 'rapide') {
            header("Location: ../views/catalogue?choix=rapide");
        } else if ($_POST['from'] === 'favoris') {
            header("Location: ../views/catalogue?choix=favoris");
        } else if ($_POST['from'] === 'top') {
            header("Location: ../views/catalogue?choix=top");
        } else {
            $search = $_POST['from'];
            header("Location: ../views/catalogue?search=$search");
        }
}