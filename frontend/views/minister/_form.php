<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Minister */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="minister-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'minister_denumire')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'minister_localitate')->textInput() ?>

    <?= $form->field($model, 'minister_adresa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'minister_created_at')->textInput() ?>

    <?= $form->field($model, 'minister_updated_at')->textInput() ?>

    <?= $form->field($model, 'minister_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
