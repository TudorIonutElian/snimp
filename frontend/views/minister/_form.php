<?php

use common\models\Localitate;
use frontend\controllers\StringController;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Minister */
/* @var $form yii\widgets\ActiveForm */

$minister_string = StringController::getMinisterFromString();
?>

<div class="minister-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container">
        <div class="row">
            <div class="col-12 bg-success text-white text-center p-2">
                <h1><?= $minister_string; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'minister_denumire')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'minister_localitate')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(Localitate::find()->where(['localitate_resedinta' => true])->orderBy('localitate_nume')->all(), 'id', function($model){
                            return $model->localitate_nume;
                        }),
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
            <div class="col-6">
                <?= $form->field($model, 'minister_adresa')->textarea(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'minister_status')->widget(Select2::classname(), [
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
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <?= Html::submitButton($minister_string, ['class' => 'btn btn-outline-success btn-block']) ?>
                </div>
            </div>
        </div>
    </div>







    <?php ActiveForm::end(); ?>

</div>
