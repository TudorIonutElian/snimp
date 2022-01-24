<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MinistereServicii */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ministere-servicii-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'minister_id')->textInput() ?>

    <?= $form->field($model, 'tip_serviciu_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
