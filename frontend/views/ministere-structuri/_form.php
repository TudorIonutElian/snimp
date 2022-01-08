<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MinistereStructuri */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ministere-structuri-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'minister_id')->textInput() ?>

    <?= $form->field($model, 'structura_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
