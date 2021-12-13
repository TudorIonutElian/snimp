<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JudeteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judete-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'judet_nume') ?>

    <?= $form->field($model, 'judet_regiune') ?>

    <?= $form->field($model, 'judet_status') ?>

    <?= $form->field($model, 'judet_created') ?>

    <?php // echo $form->field($model, 'judet_updated') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
