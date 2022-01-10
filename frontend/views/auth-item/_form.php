<?php

use frontend\controllers\StringController;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
    $titlu_modificabil_rol = StringController::getRolString();
?>

<div class="auth-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container">
        <div class="row my-2">
            <div class="col-12 text-center p-2 bg-success text-white">
                <?= $titlu_modificabil_rol;?>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Denumire Rol') ?>
            </div>
            <div class="col-4">
                <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>
            </div>
            <div class="col-4">
                <?= $form->field($model, 'data')->textarea(['rows' => 2])->label('Detalii Rol') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <?= Html::submitButton($titlu_modificabil_rol, ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
