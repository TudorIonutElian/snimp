<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Prestari */

$this->title = 'Update Prestari: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Prestaris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prestari-update">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
