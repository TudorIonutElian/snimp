<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Servicii */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicii-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'serviciu_denumire_s')->textInput() ?>

    <?= $form->field($model, 'serviciu_active_s')->textInput() ?>

    <?= $form->field($model, 'serviciu_active_since_s')->textInput() ?>

    <?= $form->field($model, 'serviciu_until_s')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
