<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LocalitateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="localitate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'localitate_nume') ?>

    <?= $form->field($model, 'localitate_judet') ?>

    <?= $form->field($model, 'localitate_status') ?>

    <?= $form->field($model, 'localitate_urban') ?>

    <?php // echo $form->field($model, 'localitate_resedinta') ?>

    <?php // echo $form->field($model, 'localitate_created') ?>

    <?php // echo $form->field($model, 'localitate_updated') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
