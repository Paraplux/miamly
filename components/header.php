<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
    <!-- *****DEBUT DU HEAD***** -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../images/logo/miamly-small-logo.png" />
    <title>Miamly</title>

    <!-- PERSONNAL SCRIPT -->
    <script src="../js/carousel.js" async></script>
    <script src="../js/antiselect.js"></script>
    <script src="../js/jquery.js"></script>
    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous" async>

    <!-- PERSONNAL CSS -->
    <!-- <link rel="stylesheet" href="../css/app.css"> -->
    <link rel="stylesheet" href="../css/carousel.css">
    <!-- DEV MODE -->
    <link rel="stylesheet/less" href="../css/less/app.less">
</head>
<body>

    <!-- *****DEBUT DE LA NAVBAR***** -->
