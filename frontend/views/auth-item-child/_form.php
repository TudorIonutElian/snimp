<?php

use common\models\AuthItem;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AuthItemChild */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-child-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'parent')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(AuthItem::find()->where(['type' => 1])->all(), 'name', 'data'),
                        'language' => 'de',
                        'options' => ['placeholder' => 'Selectează rol'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'child')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(AuthItem::find()->where(['type' => 2])->orderBy(['data' => SORT_ASC])->all(), 'name', 'data'),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Selectează permisiune'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
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
