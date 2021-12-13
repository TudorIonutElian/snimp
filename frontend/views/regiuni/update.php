<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Regiuni */

$this->title = 'Update Regiuni: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Regiunis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="regiuni-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
