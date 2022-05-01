<?php

use common\models\Localitate;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model common\models\StructuriSubordonateServicii */
/* @var $form yii\widgets\ActiveForm */
/* @var $servicii common\models\InstitutiiServicii */
?>

<div class="structuri-subordonate-servicii-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'serviciu_id_sss', [
                    'errorOptions' => [
                        'class' => 'form-control-feedback-error',
                    ]])->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map($servicii, 'id', 'tip_serviciu_denumire'),
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Selectează Serviciul ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Selectează Tipul de Serviciu')
                ?>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'localitate_id_sss', [
                    'errorOptions' => [
                        'class' => 'form-control-feedback-error',
                    ]])->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Localitate::find()->limit(5)->all(), 'id', 'localitate_nume'),
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Localitate Curenta...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Așteptare rezultate..'; }"),
                        ],
                        'ajax' => [
                            'url' => Url::to(['localitate/localitati-by-name']),
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(city) { return city.text; }'),
                        'templateSelection' => new JsExpression('function (city) { return city.text; }'),
                    ],
                ])->label('Selectează Localitatea')
                ?>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'is_open_weekend_sss', [
                    'errorOptions' => [
                        'class' => 'form-control-feedback-error',
                    ]])->widget(Select2::classname(), [
                    'data' => ['0' => 'Nu', '1' => 'Da'],
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Este deschis în Weekend?'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Deschis în Weekend?')
                ?>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'is_open_nonstop_sss', [
                    'errorOptions' => [
                        'class' => 'form-control-feedback-error',
                    ]])->widget(Select2::classname(), [
                    'data' => ['0' => 'Nu', '1' => 'Da'],
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Este deschis Non Stop?'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Deschis Non Stop?')
                ?>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'is_active_sss', [
                    'errorOptions' => [
                        'class' => 'form-control-feedback-error',
                    ]])->widget(Select2::classname(), [
                    'data' => ['0' => 'Inactiv', '1' => 'Activ'],
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Este Activ?'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Este Activ?')
                ?>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="form-group">
                    <?= Html::submitButton('Salveaza datele selectate', ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
