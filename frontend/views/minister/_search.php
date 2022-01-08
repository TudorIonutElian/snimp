<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MinisterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="minister-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'minister_denumire') ?>

    <?= $form->field($model, 'minister_localitate') ?>

    <?= $form->field($model, 'minister_adresa') ?>

    <?= $form->field($model, 'minister_created_at') ?>

    <?php // echo $form->field($model, 'minister_updated_at') ?>

    <?php // echo $form->field($model, 'minister_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
