<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TipuriExceptie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipuri-exceptie-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'te_exceptie_denumire')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'te_exceptie_status')->widget(Select2::classname(), [
                    'data' => ['0' => 'Inactivă', '1' => 'Activă'],
                    'language' => 'de',
                    'options' => ['placeholder' => 'Stare excepție ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])
                ?>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="form-group">
                    <?= Html::submitButton('Salveaza datele introduse', ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>







    <?php ActiveForm::end(); ?>

</div>
