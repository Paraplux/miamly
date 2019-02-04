<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$idRecette = $_POST['current_recette'];
$idUtilisateur = $_SESSION['utilisateur']['u_id'];

if(isset($_POST['submit'])) {

    if(empty($_POST['commentaire'])) {
        $_SESSION['toast']['erreur']['commentaire'] = "Il faut entrer un commentaire !";
    }

    if(empty($_SESSION['toast']['erreur'])) {
        require '../components/db.php';
        $req = $pdo->prepare('INSERT INTO mly_commentaires SET c_corpus = :c_corpus, c_date = :c_date, c_recette_id = :current_recette, c_utilisateur_id = :current_utilisateur');
        $req->execute(array(
            ':c_corpus' => $_POST['commentaire'],
            ':c_date' => date('Y-m-d'),
            ':current_recette' => $idRecette,
            ':current_utilisateur' => $idUtilisateur
        ));
        $_SESSION['toast']['success']['commentaire'] = "Votre commentaire a bien été ajouté!";
        $currentUrl = "../views/recette?r=$idRecette";
        header("Location: $currentUrl");
    }
}