<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MinistereServicii */

$this->title = 'Adaugă servicii Ministerului';
?>
<div class="ministere-servicii-update">

    <h1 class="text-center mb-3"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
