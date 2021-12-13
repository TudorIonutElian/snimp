<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Sesizari */

$this->title = 'Update Sesizari: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sesizaris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sesizari-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
