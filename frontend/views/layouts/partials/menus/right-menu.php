<?php

use yii\bootstrap4\Html;

?>
<?php if(Yii::$app->user->getIsGuest()): ?>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?r=site/login" class="nav-link">
            <img src="images/login.png" alt="">
        </a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?r=site/signup" class="nav-link">
            <img src="images/register.png" alt="">
        </a>
    </li>

<?php else: ?>

    <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?r=site/logout" class="nav-link" data-method="post">
            <img src="images/logout.png" alt="">
        </a>
    </li>

<?php endif; ?>


