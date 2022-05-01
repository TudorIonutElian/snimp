<?php

use yii\bootstrap4\Html;

?>
<?php if(Yii::$app->user->getIsGuest()): ?>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?r=site/login" class="nav-link btn btn-sm btn-primary text-white rounded mr-1">
            Autentificare
        </a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?r=site/signup" class="nav-link btn btn-sm btn-info rounded text-white">
            Înrolare
        </a>
    </li>

<?php else: ?>

    <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?r=site/logout" class="nav-link btn btn-sm btn-danger text-white" data-method="post">
           Logout <?= Yii::$app->user->identity->username;?>
        </a>
    </li>

<?php endif; ?>


