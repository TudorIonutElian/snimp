<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutieServiciu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institutie-serviciu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'is_institutie')->textInput() ?>

    <?= $form->field($model, 'is_serviciu')->textInput() ?>

    <?= $form->field($model, 'is_localitate')->textInput() ?>

    <?= $form->field($model, 'is_open_weekend')->textInput() ?>

    <?= $form->field($model, 'is_open_nonstop')->textInput() ?>

    <?= $form->field($model, 'is_active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
