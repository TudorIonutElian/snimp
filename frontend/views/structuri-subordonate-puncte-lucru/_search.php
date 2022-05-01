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

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
