<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TipuriServiciu */

$this->title = 'Create Tipuri Serviciu';
$this->params['breadcrumbs'][] = ['label' => 'Tipuri Servicius', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipuri-serviciu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
