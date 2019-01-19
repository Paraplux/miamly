<?php

if(isset($_POST)){


    $content = "";

    foreach($_POST['step'] as $step) {
        $content .= "<li>" . $step . "</li>";
    }

    if(empty($_POST['nom'])){
        $_SESSION['toast']['erreur']['nom'] = "Il faut entrer un nom à votre recette!";
    }

    if(empty($_SESSION['toast'])) {

        require '../components/db.php';

        $req = $pdo->prepare("INSERT INTO mly_recettes SET r_nom = :nom, r_content = :content, r_type = :typerecette, r_date = :created_at, r_difficulte = :difficulte, r_duree = :duree, r_createur = :createur");

        var_dump($req);
        $params = array(
            ':nom' => $_POST['nom'],
            ':content' => $content,
            ':typerecette' => $_POST['typerecette'],
            ':created_at' => date('Y-m-d'),
            ':difficulte' => $_POST['difficulte'],
            ':duree' => $_POST['duree'],
            ':createur' => $_POST['createur']
        );
        echo "<br><br>";
        var_dump($params);
        $req->execute($params);

    }
}