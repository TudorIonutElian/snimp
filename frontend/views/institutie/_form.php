<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Institutie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institutie-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'institutie_structura')->textInput() ?>

    <?= $form->field($model, 'institutie_denumire')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'institutie_localitate_id')->textInput() ?>

    <?= $form->field($model, 'institutie_data_creare')->textInput() ?>

    <?= $form->field($model, 'institutie_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
