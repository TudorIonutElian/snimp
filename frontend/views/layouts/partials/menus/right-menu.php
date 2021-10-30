<?php

use yii\bootstrap4\Html;

?>
<?php if(Yii::$app->user->getIsGuest()): ?>
    <li class="nav-item d-none d-sm-inline-block bg-info text-white rounded">
        <a href="index.php?r=site/signup" class="nav-link">Inrolare</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block bg-success text-white rounded ml-2">
        <a href="index.php?r=site/login" class="nav-link">Autentificare</a>
    </li>

<?php else: ?>

    <li class="nav-item d-none d-sm-inline-block">
        <?= Html::a('Logout '.Yii::$app->user->identity->username, ['site/logout'], ['class' => 'btn btn-danger', 'data-method' => 'post']) ?>
    </li>

<?php endif; ?>


