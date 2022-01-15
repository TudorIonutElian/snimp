<?php

use frontend\controllers\StringController;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Regiune */
/* @var $form yii\widgets\ActiveForm */

$titlu_modificabil_regiune = StringController::getStringRegiune();
?>

<div class="regiune-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?= $form->field($model, 'regiune_nume')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?= $form->field($model, 'regiune_status')->widget(Select2::classname(), [
                    'data' => ['0' => 'Inactivă', '1' => 'Activă'],
                    'options' => ['placeholder' => 'Selectează status ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <?= Html::submitButton($titlu_modificabil_regiune, ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
