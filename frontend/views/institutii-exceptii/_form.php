<?php

use common\models\TipuriExceptie;
use frontend\controllers\InstitutiiExceptiiController;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutiiExceptii */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institutii-exceptii-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?= $form->field($model, 'institutie_id')->widget(Select2::classname(), [
                    'data' => [Yii::$app->user->identity->institutie_id => \common\models\Institutie::findOne(Yii::$app->user->identity->institutie_id)->institutie_denumire],
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Instituție ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false) ?>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">

                <?= $form->field($model, 'exceptie_id')->widget(Select2::classname(), array(
                    'data' => ArrayHelper::map(InstitutiiExceptiiController::getExceptiiDisponibile(), 'id', 'te_exceptie_denumire'),
                    'language' => 'ro',
                    'options' => array('placeholder' => 'Exceptie ...'),
                    'pluginOptions' => array(
                        'allowClear' => true
                    ),
                ))->label(false) ?>
            </div>
            <div class="col-3"></div>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
