<header>
    <nav>
        <div class="hidden-nav">
            <div class="hidden-nav-column">
                <a href="">Top recettes</a>
                <a href="">Tout pour mon bidon</a>
                <a href="">Recette au hasard</a>
            </div>
            <div class="hidden-nav-column">
                <a href="">Mes selections</a>
                <a href="">Manger sur le pouce</a>
                <a href="">Les recettes communautaire</a>
            </div>
            <div class="hidden-nav-column">
                <a href="">A partager</a>
                <a href="">Les outils</a>
                <a href="https://www.neonmag.fr/content/uploads/2016/10/CHIEN3.gif" target="_blank">Vegge t'as rien</a>
            </div>
        </div>
        <div class="nav-bar">
            <a class="nav-logo" href="../views/home"><img src="../images/logo/miamly-full-logo.png" alt="logo miamly"></a>
            <div class="nav-menu toggle-header"><img src="../images/icons/miamly-hamburger.png" alt="icon hamburger"></div>
            <div class="nav-items center-nav">
                <a class="desktop-link" href="../views/recette">Recette</a>
                <a class="desktop-link" href="../views/ajouts">Derniers ajouts</a>
                <a class="desktop-link" href="">Mardi Gras</a>
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
                if(isset($_SESSION['utilisateur'])) {
                    $account = "../views/account.php";
                } else {
                    $account = "../views/login.php";
                }
                if($_SESSION['utilisateur']['u_avatar'] != NULL) {
                    $avatar = '<img class="avatar" src="' . $_SESSION['utilisateur']['u_avatar'] . '" alt="">';
                } else {
                    $avatar = '<i class="fas fa-user"></i>';
                }
                ?>
                <a  href=<?= $account; ?>><?= $avatar; ?></a>
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
            <a class="mobile-button" href="../views/account.php"><i class="fas fa-user"></i></a>
        </div>

        <!-- POP UP ACCOUNT -->
        <div class="popup">
            
        </div>
    </nav>
</header>
<div class="header-fix"></div>
    
