<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ServiciuExceptieSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="serviciu-exceptie-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'se_serviciu') ?>

    <?= $form->field($model, 'se_serviciu_start_exceptie') ?>

    <?= $form->field($model, 'se_serviciu_end_exceptie') ?>

    <?= $form->field($model, 'se_serviciu_added_by') ?>

    <?php // echo $form->field($model, 'se_serviciu_active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
