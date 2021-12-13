<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Localitati */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="localitati-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'localitate_nume')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'localitate_judet')->textInput() ?>

    <?= $form->field($model, 'localitate_status')->textInput() ?>

    <?= $form->field($model, 'localitate_urban')->textInput() ?>

    <?= $form->field($model, 'localitate_resedinta')->textInput() ?>

    <?= $form->field($model, 'localitate_created')->textInput() ?>

    <?= $form->field($model, 'localitate_updated')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
