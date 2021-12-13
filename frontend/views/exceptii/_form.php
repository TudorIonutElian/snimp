<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Exceptii */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exceptii-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'denumire_exceptie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_exceptie')->textInput() ?>

    <?= $form->field($model, 'end_exceptie')->textInput() ?>

    <?= $form->field($model, 'status_exceptie')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
