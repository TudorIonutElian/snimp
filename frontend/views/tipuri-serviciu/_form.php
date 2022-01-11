<?php

use frontend\controllers\StringController;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TipuriServiciu */
/* @var $form yii\widgets\ActiveForm */

$tip_serviciu_string = StringController::getTipuriServiciuString();
?>

<div class="tipuri-serviciu-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <?= $form->field($model, 'tip_serviciu_denumire')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-4">
                <?= $form->field($model, 'tip_serviciu_active')->widget(Select2::classname(), [
                    'data' => ['0' => 'Inactiv', '1' => 'Activ'],
                    'language' => 'de',
                    'options' => ['placeholder' => 'Stare ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])
                ?>
            </div>
            <div class="col-4">
                <?= $form->field($model, 'tip_serviciu_start_date')->widget(DatePicker::classname(), [
                    'options' => [
                            'placeholder' => 'Introduceti data creare',
                            'value' => date('d-m-Y'),
                    ],
                    'pluginOptions' => [
                        'autoclose' => true
                    ]
                ]);?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <?= Html::submitButton($tip_serviciu_string, ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
