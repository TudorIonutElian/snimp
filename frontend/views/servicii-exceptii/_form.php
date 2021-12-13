<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ServiciiExceptii */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicii-exceptii-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_se')->textInput() ?>

    <?= $form->field($model, 'serviciu_id_se')->textInput() ?>

    <?= $form->field($model, 'start_exceptie_se')->textInput() ?>

    <?= $form->field($model, 'end_exceptie_se')->textInput() ?>

    <?= $form->field($model, 'added_by_se')->textInput() ?>

    <?= $form->field($model, 'is_active_se')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
