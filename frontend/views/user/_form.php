<?php

use common\models\Institutie;
use common\models\InstitutiiStructuriSubordonate;
use common\models\Localitate;
use frontend\controllers\StringController;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
/* @var $roluri */
/* @var $ministere */
/* @var $institutii */
/* @var $structuriSubordonate */

$user_string = StringController::getUserFromString();
$urlToLocalitatiAjax = Url::to(['localitate/localitati-by-name']);


$dateToday = date('d-m-Y');
$date18YearsAgo = date('d-m-Y', strtotime($dateToday.'-18 year'));


?>

<div class="user-form">

    <?php $form = ActiveForm::begin([]); ?>

    <div class="container">
        <div class="row mb-3">
            <div class="col-12 text-center text-white p-2 bg-success">
                <?= $user_string ?>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <?= $form->field($model, 'username', [
                    'errorOptions' => [
                        'class' => 'form-control-feedback-error',
                    ],
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Username</span>
                          </div>
                          {input}
                        </div>'
                ])->textInput([])->label(false) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'nume', [
                    'errorOptions' => [
                        'class' => 'form-control-feedback-error',
                    ],
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Nume</span>
                          </div>
                          {input}
                        </div>'
                ])->textInput()->label(false) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'prenume', [
                    'errorOptions' => [
                        'class' => 'form-control-feedback-error',
                    ],
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Prenume</span>
                          </div>
                          {input}
                        </div>'
                ])->textInput(['maxlength' => true])->label(false) ?>
            </div>

            <div class="col-6">
                <?= $form->field($model, 'nume_anterior', [
                    'errorOptions' => [
                        'class' => 'form-control-feedback-error',
                    ],
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Nume anterior:</span>
                          </div>
                          {input}
                        </div>'
                ])->textInput(['maxlength' => true])->label(false) ?>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <?= $form->field($model, 'cod_numeric_personal', [
                    'errorOptions' => [
                        'class' => 'form-control-feedback-error',
                    ],
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Codul numeric personal</span>
                          </div>
                          {input}
                        </div>'
                ])->textInput(['maxlength' => true])->label(false) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'data_nasterii')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Data na??terii'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy',
                        'endDate' => $date18YearsAgo
                    ]
                ])->label(false);
                ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'localitatea_nasterii', [
                    'errorOptions' => [
                        'class' => 'form-control-feedback-error',
                    ],
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Localitate na??tere</span>
                          </div>
                          {input}
                        </div>'
                ])->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Localitate::find()->limit(5)->all(), 'id', 'localitate_nume'),
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Localitate ...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'A??teptare rezultate..'; }"),
                        ],
                        'ajax' => [
                            'url' => $urlToLocalitatiAjax,
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(city) { return city.text; }'),
                        'templateSelection' => new JsExpression('function (city) { return city.text; }'),
                    ],
                ])->label(false)
                ?>
            </div>

            <div class="col-6">
                <?= $form->field($model, 'email', [
                    'errorOptions' => [
                        'class' => 'form-control-feedback-error',
                    ],
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Email</span>
                          </div>
                          {input}
                          <div class="invalid-feedback"></div>
                        </div>'
                ])->textInput(['maxlength' => true])->label(false) ?>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <?= $form->field($model, 'status', [
                    'errorOptions' => [
                        'class' => 'form-control-feedback-error',
                    ],
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Stare Utilizator</span>
                          </div>
                          {input}
                        </div>'
                ])->widget(Select2::classname(), [
                    'data' => ['9' => 'INACTIV', '10' => 'ACTIV'],
                    'language' => 'de',
                    'options' => ['placeholder' => 'Regiune ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false)
                ?>
            </div>

            <div class="col-6">
                <?= $form->field($model, 'localitate_id', [
                    'errorOptions' => [
                        'class' => 'form-control-feedback-error',
                    ],
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Localitate Curenta:</span>
                          </div>
                          {input}
                        </div>'
                ])->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Localitate::find()->limit(5)->all(), 'id', 'localitate_nume'),
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Localitate Curenta...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'A??teptare rezultate..'; }"),
                        ],
                        'ajax' => [
                            'url' => $urlToLocalitatiAjax,
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(city) { return city.text; }'),
                        'templateSelection' => new JsExpression('function (city) { return city.text; }'),
                    ],
                ])->label(false) ?>
            </div>

            <div class="col-6">
                <?= $form->field($model, 'rol', [
                    'errorOptions' => [
                        'class' => 'form-control-feedback-error',
                    ],
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Rol Utilizator:</span>
                          </div>
                          {input}
                        </div>'
                ])->widget(Select2::classname(), [
                    'data' => ArrayHelper::map($roluri, 'name', 'data'),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Rol ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false) ?>
            </div>
            <div class="col-12">
                <?= $form->field($model, 'minister_id', [
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Minister:</span>
                          </div>
                          {input}
                        </div>'
                ])->widget(Select2::classname(), [
                    'data' => ArrayHelper::map($ministere, 'id', 'minister_denumire'),
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Minister ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <?= $form->field($model, 'institutie_id', [
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Institutie:</span>
                          </div>
                          {input}
                        </div>'
                ])->widget(Select2::classname(), [
                    'data' => ArrayHelper::map($institutii, 'id', 'institutie_denumire'),
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Institutie ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false) ?>
            </div>
        </div>

        <?php
            if (NULL !== Institutie::findOne(Yii::$app->user->identity->institutie_id) &&
                Institutie::findOne(Yii::$app->user->identity->institutie_id)->hasStructuriSubordonate()): ?>

            <div class="row">
                <div class="col-12">
                    <?= $form->field($model, 'institutie_subordonata_id', [
                        'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Institutie subordonata:</span>
                          </div>
                          {input}
                        </div>'
                    ])->widget(Select2::classname(), [
                        'data' => ArrayHelper::map($structuriSubordonate, 'id_iss', 'institutie_denumire_iss'),
                        'language' => 'ro',
                        'options' => ['placeholder' => 'Institutie subordonat??...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label(false) ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <?= Html::submitButton($user_string, ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>
</div>


<style>
    .input-group-prepend {
        width: 40%;
        text-align: right;
    }

    .input-group-text {
        width: 100%;
    }

    .input-group-text.kv-date-picker,
    .input-group-text.kv-date-remove {
        width: 8%;
    }

    input.form-control {
        text-align: center;
    }

    .form-control-feedback-error {
        color: #e74c3c;
    }

    td.disabled.day{
        background-color: red!important;
        font-weight: bold!important;
        color: #fff!important;
    }

</style>

<script>
    $('#user-localitatea_nasterii').keypress(function () {
        console.log("Handler for .keypress() called.");
    });
</script>
