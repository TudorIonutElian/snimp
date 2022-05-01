<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StructuriSubordonatePuncteLucru */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="structuri-subordonate-puncte-lucru-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'minister_id_sspl')->textInput() ?>

    <?= $form->field($model, 'institutie_id_sspl')->textInput() ?>

    <?= $form->field($model, 'structura_subordonata_id_sspl')->textInput() ?>

    <?= $form->field($model, 'localitate_id_sspl')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
