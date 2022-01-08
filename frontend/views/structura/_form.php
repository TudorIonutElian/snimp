<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Structura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="structura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'structura_minister')->textInput() ?>

    <?= $form->field($model, 'structura_nume')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'structura_start_date')->textInput() ?>

    <?= $form->field($model, 'structura_end_date')->textInput() ?>

    <?= $form->field($model, 'structura_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
