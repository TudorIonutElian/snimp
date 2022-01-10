<?php

use frontend\controllers\StringController;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Structura */
/* @var $form yii\widgets\ActiveForm */
$structura_string = StringController::getStructuraString();
?>

<div class="structura-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 bg-success text-white text-center p-2">
                <h1><?= $structura_string; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'structura_nume')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'structura_status')->widget(Select2::classname(), [
                    'data' => ['0' => 'Inactivă', '1' => 'Activă'],
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Stare ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <?= Html::submitButton($structura_string, ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
