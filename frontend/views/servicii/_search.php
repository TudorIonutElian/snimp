<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ServiciiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicii-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'serviciu_denumire_s') ?>

    <?= $form->field($model, 'serviciu_active_s') ?>

    <?= $form->field($model, 'serviciu_active_since_s') ?>

    <?= $form->field($model, 'serviciu_until_s') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
