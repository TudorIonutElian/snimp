<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LocalitatiServicii */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="localitati-servicii-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'serviciu_id')->textInput() ?>

    <?= $form->field($model, 'institutie_id')->textInput() ?>

    <?= $form->field($model, 'localitate_id')->textInput() ?>

    <?= $form->field($model, 'servicii_weekend')->textInput() ?>

    <?= $form->field($model, 'servicii_non_stop')->textInput() ?>

    <?= $form->field($model, 'is_active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
