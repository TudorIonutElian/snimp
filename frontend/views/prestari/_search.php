<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PrestariSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prestari-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'institutie_id_p') ?>

    <?= $form->field($model, 'serviciu_id_p') ?>

    <?= $form->field($model, 'denumire_p') ?>

    <?= $form->field($model, 'stare_p') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
