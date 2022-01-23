<?php

use common\models\Minister;
use common\models\Structura;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MinistereStructuri */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ministere-structuri-form">

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

                $minister_id = Yii::$app->user->identity->minister_id;
                $structuri_deja_salvate = \common\models\MinistereStructuri::find()->where(['minister_id' => $minister_id])->select(['structura_id'])->all();
                $structuri_not_available = [];

                foreach ($structuri_deja_salvate as $sds){
                    array_push($structuri_not_available, $sds->structura_id);
                }

                echo $form->field($model, 'structura_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Structura::find()->where([
                        'not in', 'id', $structuri_not_available
                    ])->orderBy(['structura_nume' => SORT_ASC])->all(), 'id', 'structura_nume'),
                    'options' => ['placeholder' => 'Selectează structura ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Selectează Structura');
                ?>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="form-group">
                    <?= Html::submitButton('Salveaza Asocierea', ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>




    <?php ActiveForm::end(); ?>

</div>
