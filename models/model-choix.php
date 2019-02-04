<?php
include "../components/db.php";

if($_GET['choix'] === 'top') {
    $titre = 'Voici les 10 recettes les plus commentées du moment !';

    $sql = "SELECT * FROM mly_recettes WHERE r_officielle = 'true'";
    $req = $pdo->prepare($sql);
    $req->execute();
    $recettes = $req->fetchAll();
    $req->closeCursor();

    $arrayCom = array();
    foreach($recettes as $recette) {
        //Récupération de la quantité de commentaires pour chaques recettes
        $req = $pdo->prepare('SELECT * FROM mly_commentaires WHERE c_recette_id = :current_recette');
        $req->execute(array(
            ':current_recette' => $recette['r_id']
        ));
        $d = $req->fetchAll();
        $req->closeCursor();
        $arrayCom += [
            $recette['r_id'] => count($d)
        ];
    }
    arsort($arrayCom);
    $commentaires = "";
    foreach($arrayCom as $recette => $commentaire) {
        $commentaires .= $recette . ",";
    }
    $commentaires = substr($commentaires, 0, -1);

    $subSql = 'SELECT MAX(p_id) AS p_id, MAX(p_link) AS p_link, p_recette_id FROM mly_photos GROUP BY p_recette_id';
    $sql = "SELECT * FROM mly_recettes INNER JOIN ($subSql) AS sub ON sub.p_recette_id = r_id WHERE r_officielle = 'true' ORDER BY FIELD(r_id, $commentaires)";
    
} else if ($_GET['choix'] === 'favoris') {
    $titre = 'Retrouvez ici votre selection de recettes favorites !';
    //Récupération des favoris
    $req = $pdo->prepare('SELECT u_fav FROM mly_utilisateurs WHERE u_id = :logged_id');
    $req->execute(array(
        ':logged_id' => $_SESSION['utilisateur']['u_id']
    ));
    $d = $req->fetch();
    $fav = $d['u_fav'];
    $req->closeCursor();
    $subSql = 'SELECT MAX(p_id) AS p_id, MAX(p_link) AS p_link, p_recette_id FROM mly_photos GROUP BY p_recette_id';

    $sql = "SELECT * FROM mly_recettes INNER JOIN ($subSql) AS sub ON sub.p_recette_id = r_id WHERE r_officielle = 'true' AND r_id IN ($fav)";
    
} else if ($_GET['choix'] === 'best') {
    $titre = 'Vous êtes un as de la cuisine ? Retrouvez ici les recettes les plus compliquées !';
    $subSql = 'SELECT MAX(p_id) AS p_id, MAX(p_link) AS p_link, p_recette_id FROM mly_photos GROUP BY p_recette_id';

    $sql = "SELECT * FROM mly_recettes INNER JOIN ($subSql) AS sub ON sub.p_recette_id = r_id WHERE r_officielle = 'true' ORDER BY r_difficulte DESC LIMIT 10";
    
} else if ($_GET['choix'] === 'easy') {
    $titre = "Vous débutez ? N'ayez crainte, nous avons selectionné pour vous les recettes les plus simples !";
    $subSql = 'SELECT MAX(p_id) AS p_id, MAX(p_link) AS p_link, p_recette_id FROM mly_photos GROUP BY p_recette_id';

    $sql = "SELECT * FROM mly_recettes INNER JOIN ($subSql) AS sub ON sub.p_recette_id = r_id WHERE r_officielle = 'true' ORDER BY r_difficulte ASC LIMIT 10";
    
} else if ($_GET['choix'] === 'rapide') {
    $titre = 'Pas le temps de cuisiner ? Retrouvez nos recettes les plus rapdies !';
    $subSql = 'SELECT MAX(p_id) AS p_id, MAX(p_link) AS p_link, p_recette_id FROM mly_photos GROUP BY p_recette_id';

    $sql = "SELECT * FROM mly_recettes INNER JOIN ($subSql) AS sub ON sub.p_recette_id = r_id WHERE r_officielle = 'true' ORDER BY FIELD(r_duree, 'Rapide', 'Moyenne', 'Longue') LIMIT 10";
    
} else {
        echo '<script> window.location.href = "../views/home"</script>';
}




$req = $pdo->prepare($sql);
$req->execute();

$recettes = $req->fetchAll();

$req->closeCursor();

//Gestion favoris
    $req = $pdo->prepare('SELECT u_fav FROM mly_utilisateurs WHERE u_id = :logged_id');
    $req->execute(array(
        ':logged_id' => $_SESSION['utilisateur']['u_id']
    ));
    $d = $req->fetch();

    $fav = explode(',' , $d['u_fav']);
    
?>