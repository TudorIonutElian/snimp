<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ServiciuExceptie */

$this->title = 'Update Serviciu Exceptie: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Serviciu Excepties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="serviciu-exceptie-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
