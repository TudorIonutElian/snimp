<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $roluri */
/* @var $ministere */

?>
<div class="user-create">

    <?= $this->render('_form', [
        'model' => $model,
        'roluri' => $roluri,
        'ministere' => $ministere
    ]) ?>

</div>
