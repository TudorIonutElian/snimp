<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TipuriExceptie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipuri-exceptie-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'te_exceptie_denumire')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'te_exceptie_start')->textInput() ?>

    <?= $form->field($model, 'te_exceptie_end')->textInput() ?>

    <?= $form->field($model, 'te_exceptie_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
