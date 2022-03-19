<?php

use common\models\MinistereExceptii;
use common\models\TipuriExceptie;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MinistereExceptii */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ministere-exceptii-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'minister_id')->widget(Select2::classname(), [
                    'data' => [Yii::$app->user->identity->minister_id => \common\models\Minister::findOne(Yii::$app->user->identity->minister_id)->minister_denumire],
                    'language' => 'de',
                    'options' => ['placeholder' => 'Minister ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false)
                ?>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?php
                    $exceptii_deja_adaugate = MinistereExceptii::find()
                                                                    ->where(['minister_id' => Yii::$app->user->identity->minister_id])
                                                                    ->select(['exceptie_id'])
                                                                    ->all();
                    $exceptii_deja_adaugate_id = array_column($exceptii_deja_adaugate, "exceptie_id");
                    $exceptii_disponibile = TipuriExceptie::find()
                                                            ->where(['te_exceptie_status' => 1])
                                                            ->andWhere(['not in', 'id', $exceptii_deja_adaugate_id])
                                                            ->select(['id', 'te_exceptie_denumire'])
                                                            ->all();

                ?>
                <?= $form->field($model, 'exceptie_id')->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map($exceptii_disponibile, 'id', 'te_exceptie_denumire'),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Exceptie ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false)
                ?>
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
