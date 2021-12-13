<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SesizariSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sesizari-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sesizare_titlu') ?>

    <?= $form->field($model, 'sesizare_continut') ?>

    <?= $form->field($model, 'sesizare_imagine') ?>

    <?= $form->field($model, 'sesizare_ip') ?>

    <?php // echo $form->field($model, 'sesizare_user_id') ?>

    <?php // echo $form->field($model, 'sesizare_data_creare') ?>

    <?php // echo $form->field($model, 'sesizare_data_solutionare') ?>

    <?php // echo $form->field($model, 'sesizare_comentariu') ?>

    <?php // echo $form->field($model, 'sesizare_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
