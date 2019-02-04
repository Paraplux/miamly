<header>
    <nav>
        <div class="hidden-nav">
            <div class="hidden-nav-column">
                <a href="../views/catalogue?choix=top">Top 10 recettes</a>
                <a href="../views/catalogue?choix=favoris">Mes favoris</a>
                <a href="">Idée à mettre</a>
            </div>
            <div class="hidden-nav-column">
                <a href="../views/catalogue?choix=best">C'est moi le meilleur</a>
                <a href="../views/catalogue?choix=easy">Je débute</a>
                <a href="../views/catalogue?choix=rapide">Manger sur le pouce</a>
            </div>
            <div class="hidden-nav-column">
                <a href="">Les outils</a>
                <a href="../views/catalogue?search=pané+frit">Pané et frit</a>
                <a href="https://www.neonmag.fr/content/uploads/2016/10/CHIEN3.gif" target="_blank">Vegge t'as rien</a>
            </div>
        </div>
        <div class="nav-bar">
            <a class="nav-logo" href="../views/home"><img src="../images/logo/miamly-full-logo.png" alt="logo miamly"></a>
            <div class="nav-menu toggle-header"><img src="../images/icons/miamly-hamburger.png" alt="icon hamburger"></div>
            <div class="nav-items center-nav">
                <a class="desktop-link" href="../views/recette">Recette au hasard</a>
                <a class="desktop-link" href="../views/ajouts">Derniers ajouts</a>
                <a class="desktop-link" href="../views/communaute">Recettes communautaires</a>
            </div>
            <div class="nav-search-bar center-nav">
                <form class="nav-search-input" action="../actions/action-search.php" method="GET">
                    <input name="search" type="text" placeholder="Que recherchez vous ?">
                </form>
                <div class="close-search"><i class="fas fa-times"></i></div>
            </div>
            <div class="nav-right-icons">
                <i class="fas fa-search toggle-search-bar"></i>
                <?php
                if(isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']['u_avatar'] != NULL) {
                    $avatar = '<img class="avatar" src="' . $_SESSION['utilisateur']['u_avatar'] . '" alt="">';
                } else {
                    $avatar = '<i class="fas fa-user"></i>';
                }
                ?>
                <div class="toggle-popup"><?= $avatar; ?></div>
            </div>
        </div>
                
        <!-- MENU MOBILE -->
        <div class="nav-bar-mobile">
            <a class="mobile-button" href="../views/home"><img src="../images/logo/miamly-small-logo.png" alt="logo miamly"></a>
            <div class="mobile-button toggle-header"><img src="../images/icons/miamly-hamburger.png" alt="icon hamburger"></div>
            <a class="mobile-button black" href="../views/recette">
                <i class="fas fa-clipboard-list"></i>
            </a>
            <a class="mobile-button black" href="">
                <i class="fas fa-utensils"></i>
            </a>
            <a class="mobile-button black" href="">
                <i class="fas fa-calendar"></i>
            </a>
            <div class="mobile-search">
                <form class="mobile-search-form" action="../actions/action-search.php" method="GET">
                    <input name="search" type="text" placeholder="Que recherchez vous ?">
                </form>
                <div class="mobile-search-close"><i class="fas fa-times"></i></div>
            </div>
            <i class=" mobile-button fas fa-search toggle-mobile-search-bar"></i>
            <?php
                if(isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']['u_avatar'] != NULL) {
                    $avatar = '<img class="avatar" src="' . $_SESSION['utilisateur']['u_avatar'] . '" alt="">';
                } else {
                    $avatar = '<i class="fas fa-user"></i>';
                }
                ?>
                <div class="toggle-popup"><?= $avatar; ?></div>
        </div>

        <!-- POP UP ACCOUNT -->
        
    </nav>
</header>
<div class="popup">
    <?php if(isset($_SESSION['utilisateur'])) : ?>
    <a href="../views/addrecette.php">Ajouter une recette</a>
    <a href="../views/account.php">Mon compte</a>
    <a href="../views/logout.php">Se déconnecter</a>
    <?php else : ?>
    <a href="../views/login.php">Se connecter</a>
    <a href="../views/sign.php">Créer un compte</a>
    <?php endif ; ?>
</div>
<div class="header-fix"></div>

    <!-- *****DEBUT DU CORPS DU CODE***** -->
    
    
