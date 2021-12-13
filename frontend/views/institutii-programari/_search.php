<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutiiProgramariSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institutii-programari-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ip_institutie_id') ?>

    <?= $form->field($model, 'ip_user_id') ?>

    <?= $form->field($model, 'ip_date_time') ?>

    <?= $form->field($model, 'ip_localitate_id') ?>

    <?php // echo $form->field($model, 'ip_validata_de') ?>

    <?php // echo $form->field($model, 'ip_status') ?>

    <?php // echo $form->field($model, 'ip_data_finalizare') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
