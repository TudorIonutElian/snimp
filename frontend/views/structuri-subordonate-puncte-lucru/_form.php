<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StructuriSubordonatePuncteLucru */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="structuri-subordonate-puncte-lucru-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <span class="bg-info text-white font-weight-bold p-2 rounded">
                    Date despre locație
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <?= $form->field($model, 'localitate_id_sspl')->textInput() ?>
            </div>
            <div class="col-4">
                <?= $form->field($model, 'strada_sspl')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-4">
                <?= $form->field($model, 'numar_strada_sspl')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <?= $form->field($model, 'bloc_strada_sspl')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-3">
                <?= $form->field($model, 'scara_bloc_sspl')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-3">
                <?= $form->field($model, 'etaj_bloc_sspl')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-3">
                <?= $form->field($model, 'apartament_sspl')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row my-4">
            <div class="col-12 text-center">
                <span class="bg-info text-white font-weight-bold p-2 rounded">
                    Date despre Prestările Oferite
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="form-group">
                    <?= Html::submitButton('Salveaza Punctul de lucru', ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
            <div class="col-3"></div>
        </div>



    </div>


    <?php ActiveForm::end(); ?>

</div>
