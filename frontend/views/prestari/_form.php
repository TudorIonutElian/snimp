<?php

use common\models\InstitutiiServicii;
use common\models\TipuriServiciu;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Prestari */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prestari-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'institutie_id_p')->widget(Select2::classname(), array(
                    'data' => [Yii::$app->user->identity->institutie_id => \common\models\Institutie::findOne(Yii::$app->user->identity->institutie_id)->institutie_denumire],
                    'language' => 'ro',
                    'options' => array('placeholder' => 'Instituție ...'),
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
                <?php
                $servicii_institutie = InstitutiiServicii::find()->where(['is_institutie' => Yii::$app->user->identity->institutie_id])->select(['is_serviciu'])->all();
                $servicii_institutie_id = array_column($servicii_institutie, "is_serviciu");

                $servicii_disponibile = TipuriServiciu::find()->where(['in', 'id', $servicii_institutie_id])->select(['id', 'tip_serviciu_denumire'])->all();

                ?>
                <?= $form->field($model, 'serviciu_id_p')->widget(Select2::classname(), array(
                    'data' => \yii\helpers\ArrayHelper::map($servicii_disponibile, 'id', 'tip_serviciu_denumire'),
                    'language' => 'ro',
                    'options' => array('placeholder' => 'Serviciu ...'),
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
                <?= $form->field($model, 'denumire_p')->textInput()->label('Denumire prestare ') ?>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'is_active')->widget(Select2::classname(), array(
                    'data' => ['0' => 'Inactiv', '1' => 'Activ'],
                    'language' => 'ro',
                    'options' => array('placeholder' => 'Stare ...'),
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
                    <?= Html::submitButton('<i class="fas fa-plus mr-2"></i>Salveaza datele introduse', ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
