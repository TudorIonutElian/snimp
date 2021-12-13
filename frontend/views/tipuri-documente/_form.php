<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TipuriDocumente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipuri-documente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'document_denumire')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'document_data_creare')->textInput() ?>

    <?= $form->field($model, 'document_data_radiere')->textInput() ?>

    <?= $form->field($model, 'document_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
