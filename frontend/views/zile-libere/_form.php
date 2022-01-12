<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ZileLibere */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zile-libere-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'anul_calendaristic')->textInput() ?>

    <?= $form->field($model, 'data_calendaristica')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
