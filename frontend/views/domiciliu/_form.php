<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Domiciliu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="domiciliu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'domiciliu_user')->textInput() ?>

    <?= $form->field($model, 'domiciliu_regiune')->textInput() ?>

    <?= $form->field($model, 'domiciliu_judet')->textInput() ?>

    <?= $form->field($model, 'domiciliu_localitate')->textInput() ?>

    <?= $form->field($model, 'domiciliu_is_resedinta')->textInput() ?>

    <?= $form->field($model, 'domiciliu_status')->textInput() ?>

    <?= $form->field($model, 'domiciliu_data_adaugarii')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
