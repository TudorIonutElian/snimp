<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DocumenteEmise */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documente-emise-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'document_tip')->textInput() ?>

    <?= $form->field($model, 'document_user_id')->textInput() ?>

    <?= $form->field($model, 'document_data_emitere')->textInput() ?>

    <?= $form->field($model, 'document_data_expirare')->textInput() ?>

    <?= $form->field($model, 'document_preluat')->textInput() ?>

    <?= $form->field($model, 'document_retras')->textInput() ?>

    <?= $form->field($model, 'document_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
