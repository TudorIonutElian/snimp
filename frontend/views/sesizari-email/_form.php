<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SesizariEmail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sesizari-email-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sesizare_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sesizare_email_status')->textInput() ?>

    <?= $form->field($model, 'sesizare_email_data_adaugare')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
