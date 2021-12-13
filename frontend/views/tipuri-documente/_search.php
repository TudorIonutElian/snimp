<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TipuriDocumenteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipuri-documente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'document_denumire') ?>

    <?= $form->field($model, 'document_data_creare') ?>

    <?= $form->field($model, 'document_data_radiere') ?>

    <?= $form->field($model, 'document_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
