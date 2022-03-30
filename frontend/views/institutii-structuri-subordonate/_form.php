<?php

use common\models\Institutie;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
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
                ))->label(false) ?>
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
                <?= $form->field($model, 'institutie_stare_iss')->widget(Select2::classname(), array(
                    'data' => ['0' => 'Inactivă', '1' => 'Activă'],
                    'language' => 'ro',
                    'options' => array('placeholder' => 'Stare structură ...'),
                    'pluginOptions' => array(
                        'allowClear' => true
                    ),
                ))->label(false) ?>
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
