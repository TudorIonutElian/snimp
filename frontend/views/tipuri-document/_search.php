<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TipuriDocumentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipuri-document-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tip_document_denumire') ?>

    <?= $form->field($model, 'tip_document_adaugare') ?>

    <?= $form->field($model, 'tip_document_radiere') ?>

    <?= $form->field($model, 'tip_document_active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
