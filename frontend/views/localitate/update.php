<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Localitate */

$this->title = 'Update Localitate: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Localitates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="localitate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
