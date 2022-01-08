<?php

use common\models\Regiune;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Judet */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Adaugă Județ';
?>

<div class="judet-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container">
        <div class="row my-2">
            <div class="col-12 text-center bg-success text-white p-2">
                <h1><?= Html::encode($this->title) ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'judet_indicativ')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'judet_nume')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row my-2">
            <div class="col-6">

                <?= $form->field($model, 'judet_regiune')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(Regiune::find()->orderBy(['regiune_nume' => SORT_ASC])->all(), 'id', 'regiune_nume'),
                        'language' => 'de',
                        'options' => ['placeholder' => 'Regiune ...'],
                        'pluginOptions' => [
                        'allowClear' => true
                        ],
                    ])
                ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'judet_status')->widget(Select2::classname(), [
                    'data' => ['0' => 'Inactiv', '1' => 'Activ'],
                    'language' => 'de',
                    'options' => ['placeholder' => 'Stare ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])
                ?>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-12">
                <div class="form-group">
                    <?= Html::submitButton('Adauga Județ', ['class' => 'btn btn-outline-success btn-block']) ?>
                </div>
            </div>
        </div>
    </div>



    <?php ActiveForm::end(); ?>

</div>
