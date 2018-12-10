<?php

/*VERSION TEST*/
$host = "localhost";
$bd = "miamly";
$user = "root";
$password = "";


try {
    $pdo = new PDO("mysql:host=$host;dbname=$bd", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}

?>

<!-- RECETTE CONTROLLER -->
<?php
$requete = $pdo->prepare('SELECT * FROM mly_recettes');
$requete->execute();

$recettesArray = $requete->fetchAll(PDO::FETCH_ASSOC); ?>


<!-- VUE RECETTE -->
<?php
foreach ($recettesArray as $recette) :
?>

<h1><?php echo $recette['r_nom'] ?></h1>
<p><?= $recette['r_content'] ?></p>
<p><?= $recette['r_id'] ?></p>

<?php
endforeach;
?>


