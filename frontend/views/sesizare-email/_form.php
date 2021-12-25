<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SesizareEmail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sesizare-email-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sesizare_email_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sesizare_institutie')->textInput() ?>

    <?= $form->field($model, 'sesizare_email_data_adaugare')->textInput() ?>

    <?= $form->field($model, 'sesizare_email_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
