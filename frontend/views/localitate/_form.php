<?php

use common\models\Judet;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Localitate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="localitate-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container">
        <div class="row my-2">
            <div class="col-12 text-center bg-success text-white p-2">
                <h1>Adaugă Localitate</h1>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-4">
                <?= $form->field($model, 'localitate_nume')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-4">
                <?= $form->field($model, 'localitate_judet')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Judet::find()->orderBy(['judet_nume' => SORT_ASC])->all(), 'id', 'judet_nume'),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Județ ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])
                ?>
            </div>
            <div class="col-4">
                <?= $form->field($model, 'localitate_urban')->widget(Select2::classname(), [
                        'data' => ['0' => 'NU', '1' => 'DA'],
                        'language' => 'de',
                        'options' => ['placeholder' => 'Urban / Rural ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])
                ?>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-4">
                <?= $form->field($model, 'localitate_resedinta')->widget(Select2::classname(), [
                        'data' => ['0' => 'NU', '1' => 'DA'],
                        'language' => 'de',
                        'options' => ['placeholder' => 'Reședință de județ ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])
                ?>
            </div>
            <div class="col-4">
                <?= $form->field($model, 'localitate_status')->widget(Select2::classname(), [
                        'data' => ['0' => 'Inactivă', '1' => 'Activă'],
                        'language' => 'de',
                        'options' => ['placeholder' => 'Stare localitate ...'],
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
                    <?= Html::submitButton('Salveaza Datele', ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
