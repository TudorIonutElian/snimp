<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DocumenteEmiseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documente-emise-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'document_tip') ?>

    <?= $form->field($model, 'document_user_id') ?>

    <?= $form->field($model, 'document_data_emitere') ?>

    <?= $form->field($model, 'document_data_expirare') ?>

    <?php // echo $form->field($model, 'document_preluat') ?>

    <?php // echo $form->field($model, 'document_retras') ?>

    <?php // echo $form->field($model, 'document_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
