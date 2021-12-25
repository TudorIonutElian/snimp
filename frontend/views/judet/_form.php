<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Judet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judet_indicativ')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judet_nume')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judet_regiune')->textInput() ?>

    <?= $form->field($model, 'judet_status')->textInput() ?>

    <?= $form->field($model, 'judet_created')->textInput() ?>

    <?= $form->field($model, 'judet_updated')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
