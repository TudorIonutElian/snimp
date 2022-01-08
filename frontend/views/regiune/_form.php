<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Regiune */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="regiune-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 my-2">Date Regiune nouă</div>
            <div class="col-sm-12 col-md-6">
                <?= $form->field($model, 'regiune_nume')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-12 col-md-6">
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
                    <?= Html::submitButton('Salvează datele regiunii', ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>

        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
