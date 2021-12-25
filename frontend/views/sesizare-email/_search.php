<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SesizareEmailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sesizare-email-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sesizare_email_address') ?>

    <?= $form->field($model, 'sesizare_institutie') ?>

    <?= $form->field($model, 'sesizare_email_data_adaugare') ?>

    <?= $form->field($model, 'sesizare_email_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
