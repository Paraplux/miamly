<?php include './header.php'; ?>

<!-- MESSAGE TOAST -->
<?php
if(isset($_SESSION['toast'])):
    foreach($_SESSION['toast'] as $type => $error): ?>
    <div class="toast-message-<?= $type; ?>">
        <div class="toast-message-dismiss"><i class="fas fa-times"></i></div>
        <?php if(isset($_SESSION['toast']['fail'])) : ?>
        <ul>
            <?php foreach ($_SESSION['toast']['fail'] as $message) : ?>
            <li> <?= $message ?> </li>
            <?php endforeach;?>
        </ul>
        <?php endif ?>
        <?php if (isset($_SESSION['toast']['success'])) : ?>
        <ul>
            <?php foreach ($_SESSION['toast']['success'] as $message) : ?>
            <li> <?= $message ?> </li>
            <?php endforeach; ?>
        </ul>
        <?php endif ?>
    </div>
    <?php
    endforeach;
    unset($_SESSION['toast']);
endif;
?>
<!-- FIN MESSAGE TOAST -->


<!-- TEST -->
<link rel="stylesheet/less" href="../css/toast.less">
<div class="toast-container">
    <div class="toast-content toast-erreur">
        <img src="../images/mascotte/mascotte2.svg" alt="">
        <ul>
            <span class="toast-dismiss"><i class="fas fa-times"></i></span>
            <li>Erreur type 1</li>
            <li>Erreur type 2</li>
            <li>Erreur type 3</li>
        </ul>
    </div>
</div>

<?php include './footer.php'; ?>