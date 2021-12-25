<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TipuriServiciu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipuri-serviciu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tip_serviciu_denumire')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tip_serviciu_start_date')->textInput() ?>

    <?= $form->field($model, 'tip_serviciu_end_date')->textInput() ?>

    <?= $form->field($model, 'tip_serviciu_active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
