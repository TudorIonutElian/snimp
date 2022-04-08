<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProgramareSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programare-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'programare_minister') ?>

    <?= $form->field($model, 'programare_institutie') ?>

    <?= $form->field($model, 'programare_serviciu') ?>

    <?= $form->field($model, 'programare_localitate') ?>

    <?php // echo $form->field($model, 'programare_user') ?>

    <?php // echo $form->field($model, 'programare_datetime') ?>

    <?php // echo $form->field($model, 'programare_validata_de') ?>

    <?php // echo $form->field($model, 'programare_numar_unic') ?>

    <?php // echo $form->field($model, 'programare_data_numar_unic') ?>

    <?php // echo $form->field($model, 'programare_data_finalizare') ?>

    <?php // echo $form->field($model, 'programare_document_solicitat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
