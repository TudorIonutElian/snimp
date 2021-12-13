<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StructuriSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="structuri-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'structura_nume') ?>

    <?= $form->field($model, 'structura_status') ?>

    <?= $form->field($model, 'structura_start_date') ?>

    <?= $form->field($model, 'structura_end_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
