<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StructuriSubordonatePuncteLucruSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="structuri-subordonate-puncte-lucru-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sspl') ?>

    <?= $form->field($model, 'minister_id_sspl') ?>

    <?= $form->field($model, 'institutie_id_sspl') ?>

    <?= $form->field($model, 'structura_subordonata_id_sspl') ?>

    <?= $form->field($model, 'localitate_id_sspl') ?>

    <?php // echo $form->field($model, 'strada_sspl') ?>

    <?php // echo $form->field($model, 'numar_strada_sspl') ?>

    <?php // echo $form->field($model, 'bloc_strada_sspl') ?>

    <?php // echo $form->field($model, 'scara_bloc_sspl') ?>

    <?php // echo $form->field($model, 'etaj_bloc_sspl') ?>

    <?php // echo $form->field($model, 'apartament_sspl') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
