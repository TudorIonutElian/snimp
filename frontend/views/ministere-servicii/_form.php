<?php

use common\models\Minister;
use common\models\TipuriServiciu;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MinistereServicii */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ministere-servicii-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'minister_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Minister::find()->where(['id' => Yii::$app->user->identity->minister_id])->all(), 'id', 'minister_denumire'),
                    'options' => ['placeholder' => 'Selectează ministerul ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Selectează Ministerul'); ?>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?php
                    $servicii_deja_alocate = \common\models\MinistereServicii::find()->where([
                            'minister_id' => Yii::$app->user->identity->minister_id
                    ])->select(['tip_serviciu_id'])->all();

                    $servicii_excludere = [];
                    foreach ($servicii_deja_alocate as $sda){
                        $servicii_excludere[] = $sda->tip_serviciu_id;
                    }
                ?>
                <?= $form->field($model, 'tip_serviciu_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(TipuriServiciu::find()
                                                                ->where(['not in', 'id', $servicii_excludere])
                                                                ->orderBy(['tip_serviciu_denumire' => SORT_ASC])
                                                                ->all(), 'id', 'tip_serviciu_denumire'),
                    'options' => ['placeholder' => 'Selectează serviciul ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Selectează serviciul'); ?>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
