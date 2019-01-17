<?php 

if(isset($_GET)) {
    if(empty($_GET['search'])) {
        header('Location: ../views/home.php');
    } else {
        header('Location: ../views/catalogue?search='. str_replace(" ", "+", $_GET['search']));
    }
}