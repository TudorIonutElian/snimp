<?php

use common\models\Localitate;
use common\models\Minister;
use common\models\Structura;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Institutie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institutie-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'institutie_minister_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Minister::find()->where([
                            'id' => Yii::$app->user->identity->minister_id
                    ])->orderBy(['minister_denumire' => SORT_ASC])->all(), 'id', 'minister_denumire'),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Minister ...'],
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
                <?php
                    $minister_id = Yii::$app->user->identity->minister_id;
                    $structuri_deja_salvate = \common\models\MinistereStructuri::find()->where(['minister_id' => $minister_id])->select(['structura_id'])->all();
                    $structuri_disponibile = [];

                    foreach ($structuri_deja_salvate as $sds){
                        array_push($structuri_disponibile, $sds->structura_id);
                    }

                    echo $form->field($model, 'institutie_structura')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Structura::find()->where([
                        'in', 'id', $structuri_disponibile
                    ])->orderBy(['structura_nume' => SORT_ASC])->all(), 'id', 'structura_nume'),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Structura ...'],
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
                <?= $form->field($model, 'institutie_denumire')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?php $urlToLocalitatiAjax  = Url::to(['localitate/localitati-by-name'])?>
                <?= $form->field($model, 'institutie_localitate_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Localitate::find()->orderBy(['localitate_nume' => SORT_ASC])->limit(10)->all(), 'id', 'localitate_nume'),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Localitate ...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Așteptare rezultate..'; }"),
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
                ])
                ?>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'institutie_status')->widget(Select2::classname(), [
                    'data' => ['0' => 'Inactivă', '1' => 'Activă'],
                    'language' => 'de',
                    'options' => ['placeholder' => 'Localitate ...'],
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
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>





    <?php ActiveForm::end(); ?>

</div>
