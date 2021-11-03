<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

   <div class="container">
       <div class="row d-flex flex-row align-content-center justify-content-center">
           <div class="col-10">
               <?= $form->field($model, 'username')->label(false) ?>
           </div>
           <div class="col-2">
               <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
               <?= Html::a('Reset', ['user/index'],['class' => 'btn btn-outline-secondary']) ?>
           </div>
       </div>
   </div>


    <?php ActiveForm::end(); ?>

</div>
