<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TipuriProgramLucru */

$this->title = 'Update Tipuri Program Lucru: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tipuri Program Lucrus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipuri-program-lucru-update">

    <h1 class="text-center mb-2"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
