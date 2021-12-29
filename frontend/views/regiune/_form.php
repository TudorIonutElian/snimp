<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Regiune */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="regiune-form">
    <div class="container">
        <div class="row">
            <div class="col-12">Date Regiune nouă</div>

            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'regiune_nume')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'regiune_status')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
