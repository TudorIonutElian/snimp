<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutieSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institutie-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'institutie_structura') ?>

    <?= $form->field($model, 'institutie_denumire') ?>

    <?= $form->field($model, 'institutie_localitate_id') ?>

    <?= $form->field($model, 'institutie_data_creare') ?>

    <?php // echo $form->field($model, 'institutie_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
