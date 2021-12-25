<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TipuriDocument */

$this->title = 'Update Tipuri Document: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tipuri Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipuri-document-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
