<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Sesizari */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sesizari-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sesizare_titlu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sesizare_continut')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sesizare_imagine')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sesizare_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sesizare_user_id')->textInput() ?>

    <?= $form->field($model, 'sesizare_data_creare')->textInput() ?>

    <?= $form->field($model, 'sesizare_data_solutionare')->textInput() ?>

    <?= $form->field($model, 'sesizare_comentariu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sesizare_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
