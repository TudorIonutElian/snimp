<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DomiciliuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="domiciliu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'domiciliu_user') ?>

    <?= $form->field($model, 'domiciliu_regiune') ?>

    <?= $form->field($model, 'domiciliu_judet') ?>

    <?= $form->field($model, 'domiciliu_localitate') ?>

    <?php // echo $form->field($model, 'domiciliu_is_resedinta') ?>

    <?php // echo $form->field($model, 'domiciliu_status') ?>

    <?php // echo $form->field($model, 'domiciliu_data_adaugarii') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
