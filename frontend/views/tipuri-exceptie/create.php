<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TipuriExceptie */

$this->title = 'Create Tipuri Exceptie';
$this->params['breadcrumbs'][] = ['label' => 'Tipuri Excepties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipuri-exceptie-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
