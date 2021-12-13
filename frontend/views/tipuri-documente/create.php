<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TipuriDocumente */

$this->title = 'Create Tipuri Documente';
$this->params['breadcrumbs'][] = ['label' => 'Tipuri Documentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipuri-documente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
