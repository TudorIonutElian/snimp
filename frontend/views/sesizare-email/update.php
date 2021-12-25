<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SesizareEmail */

$this->title = 'Update Sesizare Email: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sesizare Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sesizare-email-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
