<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RecenziiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recenzii-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'recenzie_institutie') ?>

    <?= $form->field($model, 'recenzie_serviciu') ?>

    <?= $form->field($model, 'recenzie_localitate') ?>

    <?= $form->field($model, 'recenzie_mesaj') ?>

    <?php // echo $form->field($model, 'recenzie_adaugata_de') ?>

    <?php // echo $form->field($model, 'recenzie_stele') ?>

    <?php // echo $form->field($model, 'recenzie_data_adaugare') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
