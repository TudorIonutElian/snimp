<?php

use frontend\controllers\SetterController;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Programare */
/* @var $form yii\widgets\ActiveForm */
/* @var $localitatiJudet ArrayObject */
?>

<div class="programare-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <?= $form->field($model, 'programare_localitate')->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map($localitatiJudet, 'id', 'localitate_nume'),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Selectați localitatea...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

            </div>
            <div class="col-sm-12 col-md-4">
                <?= $form->field($model, 'programare_institutie')->widget(Select2::classname(), [
                    'data' => [],
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Selectați institutia...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>

            <div class="col-sm-12 col-md-4">
                <?= $form->field($model, 'programare_structura_subordonata')->widget(Select2::classname(), [
                    'data' => [],
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Selectați structura directa...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-12 col-md-4">
                <?= $form->field($model, 'programare_serviciu')->widget(Select2::classname(), [
                    'data' => [],
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Selectați serviciul...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>
            <div class="col-sm-12 col-md-4">
                <?= $form->field($model, 'programare_prestare')->widget(Select2::classname(), [
                    'data' => [],
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Selectați tipul prestării...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>
            <div class="col-sm-12 col-md-4">
                <?= $form->field($model, 'programare_punct_lucru')->widget(Select2::classname(), [
                    'data' => [],
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Selectați punctul de lucru...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>
            <div class="col-sm-12 col-md-4">
                <?= $form->field($model, 'programare_data')->widget(DateTimePicker::classname(), [
                    'options' => [
                        'placeholder' => 'Selectează intervalul ...',

                    ],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'minuteStep' => 15,
                        'timePicker' => true,
                        'locale' => [
                            'format' => 'Y-m-d h:i',
                        ],
                        'timePicker24Hour' => true,
                        'daysOfWeekDisabled' => '0,6',
                        'hoursDisabled' => '0,1,2,3,4,5,6,7,16,17,18,19,20,21,22,23'
                    ],
                    'pluginEvents' =>[
                        "changeDate" => "function(e) {  alert(123)}",
                    ]



                ]);
                ?>

            </div>
            <div class="col-sm-12 col-md-4">
                <?php
                    if(!Yii::$app->user->getIsGuest()){
                        SetterController::setFormModel($model, 'programare_email', Yii::$app->user->identity->email);
                    }
                ?>
                <?= $form->field($model, 'programare_email')->textInput() ?>
            </div>
            <div class="col-sm-12 col-md-4">
                <?php
                    if(!Yii::$app->user->getIsGuest()){
                        SetterController::setFormModel($model, 'programare_nume', Yii::$app->user->identity->nume);
                    }
                ?>
                <?= $form->field($model, 'programare_nume')->textInput() ?>
            </div>

            <div class="col-sm-12 col-md-4">
                <?php
                if(!Yii::$app->user->getIsGuest()){
                    SetterController::setFormModel($model, 'programare_prenume', Yii::$app->user->identity->prenume);
                }
                ?>
                <?= $form->field($model, 'programare_prenume')->textInput() ?>
            </div>

            <div class="col-sm-12 col-md-4">
                <?= $form->field($model, 'programare_telefon')->textInput() ?>
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

<?php $this->registerJsFile("@web/js/plugins/views/programare/form.js"); ?>
<?php $this->registerCssFile("@web/css/plugins/views/programare/form.css"); ?>
