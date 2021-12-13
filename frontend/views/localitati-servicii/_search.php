<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LocalitatiServiciiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="localitati-servicii-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'serviciu_id') ?>

    <?= $form->field($model, 'institutie_id') ?>

    <?= $form->field($model, 'localitate_id') ?>

    <?= $form->field($model, 'servicii_weekend') ?>

    <?php // echo $form->field($model, 'servicii_non_stop') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
