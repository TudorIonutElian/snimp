<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ServiciuExceptie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="serviciu-exceptie-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'se_serviciu')->textInput() ?>

    <?= $form->field($model, 'se_serviciu_start_exceptie')->textInput() ?>

    <?= $form->field($model, 'se_serviciu_end_exceptie')->textInput() ?>

    <?= $form->field($model, 'se_serviciu_added_by')->textInput() ?>

    <?= $form->field($model, 'se_serviciu_active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
