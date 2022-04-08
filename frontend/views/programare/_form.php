<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Programare */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programare-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'programare_minister')->textInput() ?>

    <?= $form->field($model, 'programare_institutie')->textInput() ?>

    <?= $form->field($model, 'programare_serviciu')->textInput() ?>

    <?= $form->field($model, 'programare_localitate')->textInput() ?>

    <?= $form->field($model, 'programare_user')->textInput() ?>

    <?= $form->field($model, 'programare_datetime')->textInput() ?>

    <?= $form->field($model, 'programare_validata_de')->textInput() ?>

    <?= $form->field($model, 'programare_numar_unic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'programare_data_numar_unic')->textInput() ?>

    <?= $form->field($model, 'programare_data_finalizare')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
