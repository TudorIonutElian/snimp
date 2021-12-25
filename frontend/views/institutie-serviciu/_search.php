<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutieServiciuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institutie-serviciu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'is_institutie') ?>

    <?= $form->field($model, 'is_serviciu') ?>

    <?= $form->field($model, 'is_localitate') ?>

    <?= $form->field($model, 'is_open_weekend') ?>

    <?php // echo $form->field($model, 'is_open_nonstop') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
