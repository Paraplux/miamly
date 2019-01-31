<?php
include("../components/db.php");

$subSql = 'SELECT MAX(p_id) AS p_id, MAX(p_link) AS p_link, p_recette_id FROM mly_photos GROUP BY p_recette_id';

$sql = "SELECT * FROM mly_recettes INNER JOIN ($subSql) AS sub ON sub.p_recette_id = r_id";

// $sql = 'SELECT r_id, r_nom, r_content, r_date, r_type, r_createur, p_link
//         FROM mly_recettes
//         INNER JOIN mly_photos ON r_id = p_recette_id
//         GROUP BY r_id, p_link';

$req = $pdo->prepare($sql);
$req->execute();

$home = $req->fetchAll();
$req->closeCursor();

?>