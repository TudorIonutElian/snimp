<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LocalitatiServicii */

$this->title = 'Update Localitati Servicii: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Localitati Serviciis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="localitati-servicii-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
