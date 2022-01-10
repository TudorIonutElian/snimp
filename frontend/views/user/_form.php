<?php

use common\models\AuthItem;
use common\models\Institutie;
use common\models\Localitate;
use frontend\controllers\StringController;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */

$user_string = StringController::getUserFromString();
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container">
        <div class="row mb-3">
            <div class="col-12 text-center text-white p-2 bg-success">
                <?= $user_string ?>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <?= $form->field($model, 'username', [
                    'errorOptions'  => [
                        'class' => 'form-control-feedback-error',
                    ],
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Username</span>
                          </div>
                          {input}
                        </div>'
                ])->textInput([])->label(false) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'nume', [
                    'errorOptions'  => [
                        'class' => 'form-control-feedback-error',
                    ],
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Nume</span>
                          </div>
                          {input}
                        </div>'
                ])->textInput()->label(false) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'prenume', [
                    'errorOptions'  => [
                        'class' => 'form-control-feedback-error',
                    ],
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Prenume</span>
                          </div>
                          {input}
                        </div>'
                ])->textInput(['maxlength' => true])->label(false) ?>
            </div>

            <div class="col-6">
                <?= $form->field($model, 'nume_anterior', [
                    'errorOptions'  => [
                        'class' => 'form-control-feedback-error',
                    ],
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Nume anterior:</span>
                          </div>
                          {input}
                        </div>'
                ])->textInput(['maxlength' => true])->label(false) ?>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <?= $form->field($model, 'cod_numeric_personal', [
                    'errorOptions'  => [
                        'class' => 'form-control-feedback-error',
                    ],
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Codul numeric personal</span>
                          </div>
                          {input}
                        </div>'
                ])->textInput(['maxlength' => true])->label(false) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'data_nasterii')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Data nașterii'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy'
                    ]
                ])->label(false);
                ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'localitatea_nasterii', [
                    'errorOptions'  => [
                        'class' => 'form-control-feedback-error',
                    ],
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Localitate naștere</span>
                          </div>
                          {input}
                        </div>'
                ])->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Localitate::find()->all(), 'id', 'localitate_nume'),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Localitate ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false)
                ?>
            </div>

            <div class="col-6">
                <?= $form->field($model, 'email', [
                    'errorOptions'  => [
                        'class' => 'form-control-feedback-error',
                    ],
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Email</span>
                          </div>
                          {input}
                        </div>'
                ])->textInput(['maxlength' => true])->label(false) ?>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <?= $form->field($model, 'status', [
                    'errorOptions'  => [
                        'class' => 'form-control-feedback-error',
                    ],
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Stare Utilizator</span>
                          </div>
                          {input}
                        </div>'
                ])->widget(Select2::classname(), [
                    'data' => ['9' => 'INACTIV', '10' => 'ACTIV'],
                    'language' => 'de',
                    'options' => ['placeholder' => 'Regiune ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false)
                ?>
            </div>

            <div class="col-6">
                <?= $form->field($model, 'localitate_id', [
                    'errorOptions'  => [
                        'class' => 'form-control-feedback-error',
                    ],
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Localitate Curenta:</span>
                          </div>
                          {input}
                        </div>'
                ])->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Localitate::find()->all(), 'id', 'localitate_nume'),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Localitate Curenta...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false) ?>
            </div>

            <div class="col-6">
                <?= $form->field($model, 'rol', [
                    'errorOptions'  => [
                        'class' => 'form-control-feedback-error',
                    ],
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Rol Utilizator:</span>
                          </div>
                          {input}
                        </div>'
                ])->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(AuthItem::find()->all(), 'name', 'data'),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Rol ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'institutie_id', [
                    'inputTemplate' => '
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Instituție:</span>
                          </div>
                          {input}
                        </div>'
                ])->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Institutie::find()->all(), 'id', 'institutie_denumire'),
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Institutie ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <?= Html::submitButton($user_string, ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>
</div>


<style>
    .input-group-prepend{
        width: 40%;
        text-align: right;
    }
    .input-group-text{
        width: 100%;
    }
    .input-group-text.kv-date-picker,
    .input-group-text.kv-date-remove{
        width: 8%;
    }
    input.form-control{
        text-align: center;
    }
    .form-control-feedback-error{
        color: #e74c3c;
    }

</style>
