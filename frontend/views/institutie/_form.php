<?php

use common\models\Localitate;
use common\models\Minister;
use common\models\Structura;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Institutie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institutie-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <?= $form->field($model, 'institutie_minister_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Minister::find()->orderBy(['minister_denumire' => SORT_ASC])->all(), 'id', 'minister_denumire'),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Minister ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])
                ?>
            </div>
            <div class="col-4">
                <?= $form->field($model, 'institutie_structura')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Structura::find()->orderBy(['structura_nume' => SORT_ASC])->all(), 'id', 'structura_nume'),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Structura ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])
                ?>
            </div>
            <div class="col-4">
                <?= $form->field($model, 'institutie_denumire')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'institutie_localitate_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Localitate::find()->orderBy(['localitate_nume' => SORT_ASC])->all(), 'id', 'localitate_nume'),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Localitate ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])
                ?>
            </div>
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
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
        </div>
    </div>





    <?php ActiveForm::end(); ?>

</div>
