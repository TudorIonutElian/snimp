<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Institutie */
/** @var $ministere */
/** @var $structuri */

?>
<div class="institutie-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'ministere' => $ministere,
        'structuri' => $structuri
    ]) ?>

</div>
