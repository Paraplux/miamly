<?php
include("../components/db.php");

$search = array(); // Stop errors when $words is empty

foreach ($_SESSION['search'] as $keyword) {
        $search[] = '
        r_nom SOUNDS LIKE "%' . $keyword . '%"
        OR r_nom LIKE "%' . $keyword . '%"
        OR r_content LIKE "%' . $keyword . '%"
        OR r_content SOUNDS LIKE "%' . $keyword . '%"
        OR r_duree LIKE "%' . $keyword . '%"
        OR r_duree SOUNDS LIKE "%' . $keyword . '%"
        OR r_createur LIKE "%' . $keyword . '%"
        OR r_createur SOUNDS LIKE "%' . $keyword . '%"
        ';
}

$sql = 'SELECT mly_recettes.r_id, mly_recettes.r_type, mly_recettes.r_nom, mly_recettes.r_content, mly_recettes.r_date, mly_recettes.r_createur, mly_photos.p_link
        FROM mly_recettes
        INNER JOIN mly_photos ON mly_recettes.r_id = mly_photos.p_recette_id
        WHERE ' . implode(" OR ", $search) . '
        GROUP BY mly_recettes.r_id, mly_photos.p_link';









$req = $pdo->prepare($sql);
$req->execute();

$recettes = $req->fetchAll();

$req->closeCursor();

// var_dump($_SESSION['search']);
// var_dump($recettes);
// var_dump($search);
// var_dump($sql);

?>