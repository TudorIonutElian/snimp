<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Regiuni */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="regiuni-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'regiune_nume')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'regiune_status')->textInput() ?>

    <?= $form->field($model, 'regiune_created')->textInput() ?>

    <?= $form->field($model, 'regiune_updated')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
