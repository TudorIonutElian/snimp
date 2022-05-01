<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StructuriSubordonateServiciiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="structuri-subordonate-servicii-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sss') ?>

    <?= $form->field($model, 'institutie_id_sss') ?>

    <?= $form->field($model, 'structura_subordonata_id_sss') ?>

    <?= $form->field($model, 'serviciu_id_sss') ?>

    <?= $form->field($model, 'localitate_id_sss') ?>

    <?php // echo $form->field($model, 'is_open_weekend_sss') ?>

    <?php // echo $form->field($model, 'is_open_nonstop_sss') ?>

    <?php // echo $form->field($model, 'is_active_sss') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
