<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LocalitatiServicii */

$this->title = 'Create Localitati Servicii';
$this->params['breadcrumbs'][] = ['label' => 'Localitati Serviciis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="localitati-servicii-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
