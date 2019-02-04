<!-- MESSAGE TOAST -->
<link rel="stylesheet/less" href="../css/toast.less">
<?php $_SESSION['toast']['success']['hello'] = "Coucou <br><br><br> CoucouCoucou <br><br><br> CoucouCoucou <br><br><br> Coucou" ?>
<?php if(isset($_SESSION['toast'])) : ?>
<div id="filter" class="filter-blur"></div>
<div id="mascotte" class="toast-container">
    <?php foreach($_SESSION['toast'] as $toast) :  ?>
        <?php if(isset($_SESSION['toast']['erreur'])) : ?>
        <div class="toast-content toast-erreur">
            <img src="../images/mascotte/mascotte-erreur.svg" alt="">
            <ul>
                <span class="toast-dismiss"><i class="fas fa-times"></i></span>
                <?php foreach ($_SESSION['toast']['erreur'] as $message) : ?>
                    <li> <?= $message ?> </li>
                <?php endforeach;?>
            </ul>
        </div>
        <?php elseif(isset($_SESSION['toast']['success'])) : ?>
        <div class="toast-content toast-success">
            <img src="../images/mascotte/mascotte-success.svg" alt="">
            <ul>
                <span class="toast-dismiss"><i class="fas fa-times"></i></span>
                <?php foreach ($_SESSION['toast']['success'] as $message) : ?>
                    <li> <?= $message ?> </li>
                <?php endforeach;?>
            </ul>
        </div>
        <?php elseif(isset($_SESSION['toast']['info'])) : ?>
        <div class="toast-content toast-info">
            <img src="../images/mascotte/mascotte-info.svg" alt="">
            <ul>
                <span class="toast-dismiss"><i class="fas fa-times"></i></span>
                <?php foreach ($_SESSION['toast']['info'] as $message) : ?>
                    <li> <?= $message ?> </li>
                <?php endforeach;?>
            </ul>
        </div>
        <?php endif ?>
    <?php endforeach;?>
    </div>
    <?php unset($_SESSION['toast']); ?>
<?php endif; ?>

<script>
var mascotte = document.querySelector('#mascotte')
var filter = document.querySelector('#filter')
mascotte.addEventListener('click', function() {
    this.style.display = "none"
    filter.style.display = "none"
})
</script>