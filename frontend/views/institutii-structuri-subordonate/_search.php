<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutiiStructuriSubordonateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institutii-structuri-subordonate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_iss') ?>

    <?= $form->field($model, 'institutie_parinte_iss') ?>

    <?= $form->field($model, 'institutie_denumire_iss') ?>

    <?= $form->field($model, 'institutie_data_creare_iss') ?>

    <?= $form->field($model, 'institutie_data_actualizare_iss') ?>

    <?php // echo $form->field($model, 'institutie_stare_iss') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
