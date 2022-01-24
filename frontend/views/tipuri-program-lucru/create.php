<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TipuriProgramLucru */

$this->title = 'Create Tipuri Program Lucru';
$this->params['breadcrumbs'][] = ['label' => 'Tipuri Program Lucrus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipuri-program-lucru-create">

    <h1 class="text-center mb-2"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
