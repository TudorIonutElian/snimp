<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Recenzie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recenzie-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'recenzie_institutie')->textInput() ?>

    <?= $form->field($model, 'recenzie_serviciu')->textInput() ?>

    <?= $form->field($model, 'recenzie_localitate')->textInput() ?>

    <?= $form->field($model, 'recenzie_mesaj')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'recenzie_adaugata_de')->textInput() ?>

    <?= $form->field($model, 'recenzie_numar_stele')->textInput() ?>

    <?= $form->field($model, 'recenzie_contact_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recenzie_contact_mobil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recenzie_data_adaugare')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
