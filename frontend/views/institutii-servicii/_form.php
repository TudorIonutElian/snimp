<?php

use common\models\Institutie;
use common\models\InstitutiiServicii;
use common\models\Localitate;
use common\models\MinistereServicii;
use common\models\TipuriServiciu;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutiiServicii */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="institutii-servicii-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'is_institutie')->widget(Select2::classname(), [
                    'data' => [Yii::$app->user->identity->institutie_id => Institutie::findOne(Yii::$app->user->identity->institutie_id)->institutie_denumire],
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Instituția ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Selectati institutia');
                ?>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?php
                $servicii_in_minister = MinistereServicii::find()->where(['minister_id' => Yii::$app->user->identity->minister_id])->select(['tip_serviciu_id'])->all();
                $servicii_in_minister_id = array_column($servicii_in_minister, "tip_serviciu_id");

                $servicii_in_institutie = InstitutiiServicii::find()->where(['is_institutie' => Yii::$app->user->identity->institutie_id])->select(['is_serviciu'])->all();
                $servicii_in_institutie_id = array_column($servicii_in_institutie, "is_serviciu");

                $servicii_disponibile = TipuriServiciu::find()
                    ->where(['in', 'id', $servicii_in_minister_id])
                    ->andWhere(['not in', 'id', $servicii_in_institutie_id])
                    ->select(['id', 'tip_serviciu_denumire'])
                    ->all();

                ?>
                <?= $form->field($model, 'is_serviciu')->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map($servicii_disponibile, 'id', 'tip_serviciu_denumire'),
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Serviciul ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Selectati serviciul');
                ?>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'is_localitate')->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(Localitate::find()->where(['id' => Yii::$app->user->identity->localitate_id])->all(), 'id', 'localitate_nume'),
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Localitate ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Selectati localitatea');
                ?>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'is_open_weekend')->widget(Select2::classname(), [
                    'data' => ['0' => 'NU', '1' => 'DA'],
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Localitate ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Disponibil 7/7?');
                ?>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'is_open_nonstop')->widget(Select2::classname(), [
                    'data' => ['0' => 'NU', '1' => 'DA'],
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Localitate ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Disponibil 24/7?');
                ?>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'is_active')->widget(Select2::classname(), [
                    'data' => ['0' => 'NU', '1' => 'DA'],
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Localitate ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Este activ?');
                ?>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row my-2">
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
