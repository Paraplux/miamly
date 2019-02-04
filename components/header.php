<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require '../components/toast.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../images/logo/miamly-small-logo.png" />
    <title>Miamly</title>

    <!-- EXTERNAL SCRIPTS -->
    <script src="../js/jquery.js"></script>
    <script src="../js/antiselect.js"></script>
    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- PERSONNAL CSS -->
    <link rel="stylesheet/less" href="../css/app.less">
    <link rel="stylesheet/less" href="../css/navbar.less">

    
</head>
<body>