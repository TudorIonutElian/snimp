<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Programare */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programare-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <?= $form->field($model, 'programare_localitate')->textInput() ?>
            </div>
            <div class="col-4">
                <?= $form->field($model, 'programare_institutie')->textInput() ?>
            </div>
            <div class="col-4">
                <?= $form->field($model, 'programare_serviciu')->textInput() ?>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <?= $form->field($model, 'programare_user')->textInput() ?>
            </div>
            <div class="col-4">
                <?= $form->field($model, 'programare_datetime')->textInput() ?>
            </div>
            <div class="col-4">
                <?= $form->field($model, 'programare_serviciu')->textInput() ?>
            </div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="form-group">
                    <?= Html::submitButton('Salveaza programarea', ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>




    <?php ActiveForm::end(); ?>

</div>
