<?php
include "../components/db.php";
$arraySearch = array(); // Stop errors when search is empty
$currentSearch = explode(" ", $_GET['search']);

foreach ($currentSearch as $keyword) {
        $arraySearch[] = '
        r_nom LIKE "%' . $keyword . '%"
        OR r_content LIKE "%' . $keyword . '%"
        OR r_duree LIKE "%' . $keyword . '%"
        OR r_createur LIKE "%' . $keyword . '%"
        ';
}

$sqlSearch = implode('OR', $arraySearch);
$subSql = 'SELECT MAX(p_id) AS p_id, MAX(p_link) AS p_link, p_recette_id FROM mly_photos GROUP BY p_recette_id';

$sql = "SELECT * FROM mly_recettes INNER JOIN ($subSql) AS sub ON sub.p_recette_id = r_id WHERE r_officielle = 'true' AND ($sqlSearch)";

$req = $pdo->prepare($sql);
$req->execute();

$recettes = $req->fetchAll();

$req->closeCursor();

if(!$recettes) {
    echo '<script> window.location.href = "../views/home"</script>';
}
?>