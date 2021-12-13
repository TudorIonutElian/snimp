<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutiiProgramari */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institutii-programari-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ip_institutie_id')->textInput() ?>

    <?= $form->field($model, 'ip_user_id')->textInput() ?>

    <?= $form->field($model, 'ip_date_time')->textInput() ?>

    <?= $form->field($model, 'ip_localitate_id')->textInput() ?>

    <?= $form->field($model, 'ip_validata_de')->textInput() ?>

    <?= $form->field($model, 'ip_status')->textInput() ?>

    <?= $form->field($model, 'ip_data_finalizare')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
