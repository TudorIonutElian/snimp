<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ServiciiExceptiiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicii-exceptii-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_se') ?>

    <?= $form->field($model, 'serviciu_id_se') ?>

    <?= $form->field($model, 'start_exceptie_se') ?>

    <?= $form->field($model, 'end_exceptie_se') ?>

    <?= $form->field($model, 'added_by_se') ?>

    <?php // echo $form->field($model, 'is_active_se') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
