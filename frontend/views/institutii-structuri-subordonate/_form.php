<?php

use common\models\Institutie;
use common\models\Regiune;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutiiStructuriSubordonate */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="institutii-structuri-subordonate-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'institutie_parinte_iss')->widget(Select2::classname(), array(
                    'data' => ArrayHelper::map(Institutie::find()->where(['id' => Yii::$app->user->identity->institutie_id])->all(), 'id', 'institutie_denumire'),
                    'language' => 'ro',
                    'options' => array('placeholder' => 'Selectați instituția ...'),
                    'pluginOptions' => array(
                        'allowClear' => true
                    ),
                ))->label('Institutia') ?>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'institutie_denumire_iss')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'institutie_regiune_id_iss')->widget(Select2::classname(), array(
                    'data' => ArrayHelper::map(Regiune::find()->all(), 'id', 'regiune_nume'),
                    'language' => 'ro',
                    'options' => array('placeholder' => 'Selectați regiunea ...'),
                    'pluginOptions' => [
                        'allowClear' => true,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Așteptare rezultate..'; }"),
                        ],
                        'ajax' => [
                            'url' => Url::to(['regiune/regiuni-by-name']),
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(city) { return city.text; }'),
                        'templateSelection' => new JsExpression('function (city) { return city.text; }'),
                    ],
                ))->label('Regiunea') ?>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'institutie_judet_id_iss')->widget(Select2::classname(), array(
                    'data' => [],
                    'language' => 'ro',
                    'options' => array('placeholder' => 'Selectați judetul ...'),
                    'pluginOptions' => [
                        'allowClear' => true,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Așteptare rezultate..'; }"),
                        ],
                        'ajax' => [
                            'url' => Url::to(['judet/judete-by-name', 'id_regiune' => $model->institutie_regiune_id_iss]),
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term, id_regiune: $(\'#institutiistructurisubordonate-institutie_regiune_id_iss\').val()} }')
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(city) { return city.text; }'),
                        'templateSelection' => new JsExpression('function (city) { return city.text; }'),
                    ],
                ))->label('Județ') ?>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'institutie_localitate_id_iss')->widget(Select2::classname(), array(
                    'data' => [],
                    'language' => 'ro',
                    'options' => array('placeholder' => 'Selectați localitate ...'),
                    'pluginOptions' => [
                        'allowClear' => true,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Așteptare rezultate..'; }"),
                        ],
                        'ajax' => [
                            'url' => Url::to(['localitate/localitati-by-name', 'id_regiune' => $model->institutie_localitate_id_iss]),
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term, id_judet: $(\'#institutiistructurisubordonate-institutie_judet_id_iss\').val()} }')
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(city) { return city.text; }'),
                        'templateSelection' => new JsExpression('function (city) { return city.text; }'),
                    ],
                ))->label('Județ') ?>
            </div>
            <div class="col-3"></div>
        </div>


        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'institutie_stare_iss')->widget(Select2::classname(), array(
                    'data' => ['0' => 'Inactivă', '1' => 'Activă'],
                    'language' => 'ro',
                    'options' => array('placeholder' => 'Stare starea ...'),
                    'pluginOptions' => array(
                        'allowClear' => true
                    ),
                ))->label('Stare') ?>
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
