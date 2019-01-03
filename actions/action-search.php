<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_GET)) {
    if(empty($_GET['search'])) {
        header('Location: ../views/home.php');
    } else {
        $search = explode(" ", $_GET['search']);
        $_SESSION['search'] = $search;
        header('Location: ../views/catalogue?search='. str_replace(" ", "+", $_GET['search']));
    }
}