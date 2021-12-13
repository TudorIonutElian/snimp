<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Recenzii */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recenzii-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'recenzie_institutie')->textInput() ?>

    <?= $form->field($model, 'recenzie_serviciu')->textInput() ?>

    <?= $form->field($model, 'recenzie_localitate')->textInput() ?>

    <?= $form->field($model, 'recenzie_mesaj')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recenzie_adaugata_de')->textInput() ?>

    <?= $form->field($model, 'recenzie_stele')->textInput() ?>

    <?= $form->field($model, 'recenzie_data_adaugare')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
