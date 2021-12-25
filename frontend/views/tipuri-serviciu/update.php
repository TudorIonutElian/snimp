<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TipuriServiciu */

$this->title = 'Update Tipuri Serviciu: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tipuri Servicius', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipuri-serviciu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
