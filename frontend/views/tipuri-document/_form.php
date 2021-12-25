<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TipuriDocument */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipuri-document-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tip_document_denumire')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tip_document_adaugare')->textInput() ?>

    <?= $form->field($model, 'tip_document_radiere')->textInput() ?>

    <?= $form->field($model, 'tip_document_active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
