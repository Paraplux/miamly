<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST)){

    if(empty($_POST['nom'])){
        $_SESSION['toast']['erreur']['nom'] = "Il faut entrer un nom à votre recette!";
    }
    
    if(count($_POST['step']) === 1 && $_POST['step'][0] === ""){
        $_SESSION['toast']['erreur']['step'] = "Attention, il n'y a aucune étape à votre recette!";
    }

    if(count($_POST['ing']) === 1 && $_POST['ing'][0] === ""){
        $_SESSION['toast']['erreur']['ing'] = "Attention, il n'y a aucun ingrédient à votre recette !";
    }

    if($_FILES['photos']['error'][0] === 4){
        $_SESSION['toast']['erreur']['photos'] = "Attention, vous n'avez pas ajouté de photo à votre recette !";
    }

    if(empty($_SESSION['toast'])) {
        require '../components/db.php';
        require '../components/class.upload.php';

        

        /*Récupération du contenu de la recette + transformation en liste*/
        $content = "";
        foreach($_POST['step'] as $step) {
            $content .= "<li>" . $step . "</li>";
        }

        /*Récupération des ingrédients de la recette + transformation en liste*/
        $ingredients = "";
        foreach($_POST['ing'] as $ing) {
            $ingredients .= "<li>" . $ing . "</li>";
        }

        /*Requête pour l'insertion de la recette*/
        $req = $pdo->prepare("INSERT INTO mly_recettes SET r_nom = :nom, r_ingredients = :ing, r_content = :content, r_type = :typerecette, r_date = :created_at, r_difficulte = :difficulte, r_duree = :duree, r_createur = :createur");
        $params = array(
            ':nom' => $_POST['nom'],
            ':ing' => $ingredients,
            ':content' => $content,
            ':typerecette' => $_POST['typerecette'],
            ':created_at' => date('Y-m-d'),
            ':difficulte' => $_POST['difficulte'],
            ':duree' => $_POST['duree'],
            ':createur' => $_POST['createur']
        );
        $req->execute($params);
        $req->closeCursor();

        /*Récupération de l'id de la recette qui vient d'être inserée*/
        $req = $pdo->prepare('SELECT r_id FROM mly_recettes WHERE r_nom = :nom AND r_createur = :createur');
        $req->execute(array(
            ':nom' => $_POST['nom'],
            ':createur' => $_POST['createur']
        ));
        $data = $req->fetch();
        $req->closeCursor();

        /*Requête pour l'insertion des photos + upload des photos*/
        $files = array(); 
        foreach ($_FILES['photos'] as $k => $l) {
            foreach ($l as $i => $v) {
                if (!array_key_exists($i, $files)) $files[$i] = array();
                $files[$i][$k] = $v;
            }
        }

        foreach($files as $file) {
            $thumb = new Upload($file);
            if ($thumb->uploaded) {
                // resized to 400px wide()
                $thumbsha1 = 'thumb_' . sha1(base64_encode(openssl_random_pseudo_bytes(30)));
                $thumb->file_new_name_body = $thumbsha1;
                $thumb->image_resize = true;
                $thumb->image_x = 640;
                $thumb->image_y = 480;
                $thumb->image_convert = 'jpg';
                $thumb->image_ratio_crop = true;
                $thumb->Process('../images/thumbs/recettes');
                $thumblink = '../images/thumbs/recettes/' . $thumbsha1 . '.jpg';
                if ($thumb->processed) {
                    $thumb->Clean();
                    $req = $pdo->prepare('INSERT INTO mly_photos SET p_link = :link, p_recette_id = :recette_id');
                    $req->execute(array(
                        ':link' => $thumblink,
                        ':recette_id' => $data['r_id']
                    ));
                    $req->closeCursor();
                }
            }
        }

        /*Requête pour l'insertion des tags*/
        foreach($_POST['tags'] as $tag) {
            $req = $pdo->prepare('INSERT INTO mly_tags SET t_nom = :tag, t_recette_id = :recette_id');
                    $req->execute(array(
                        ':tag' => $tag,
                        ':recette_id' => $data['r_id']
                    ));
                    $req->closeCursor();
        }
        
        /*Messages toast et redirection*/
        $_SESSION['toast']['success']['addrecette'] = 'La recette a bien été ajouté !';
        header('Location: ../views/addrecette.php');
    } else {
        header('Location: ../views/addrecette.php');
    }
}



