<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Institutie */
/** @var $ministere */
/** @var $structuri */
?>
<div class="institutie-create">


    <?= $this->render('_form', [
        'model' => $model,
        'ministere' => $ministere,
        'structuri' => $structuri
    ]) ?>

</div>
