<?php

if (session_status() == PHP_SESSION_NONE) {
session_start();
}

include '../components/header.php';
include '../components/navbar.php';
include '../controllers/controller-recettes.php';
?>
<link rel="stylesheet" href="../css/card2.css">
<br><br>
<div class="container">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href=essai.css>
    <title>Document</title>
</head>
<body>
    <div class="recette-comm">
        <div class="photo-comm"><img src="../images/thumbs/recettes/fondant.jpg"  class="imagedefou"></div>    
        <div class="resume-comm">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae accusantium error, fuga, reiciendis, eos excepturi commodi dolore enim architecto aliquid necessitatibus veritatis aut quis quae voluptatem? Sunt nesciunt repellat accusamus!</div>
        <div class="note">Lorem ipsu Error esse natus fuga, perspiciatis illum placeat facilis quide.</div>
        <div class="xp_bar">Lorem ipsum dolorrepellendus facilis nesciunt! Odit magni neque dolores hic non praesentium tenetur illo ipsam. In distinctio vel voluptates!</div>
    </div>

<?php 
include '../components/footer.php';
?>