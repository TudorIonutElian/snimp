<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutiiExceptii */

$this->title = 'Vizualizare excepție';
$this->params['breadcrumbs'][] = ['label' => 'Listă excepții', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="institutii-exceptii-update">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
