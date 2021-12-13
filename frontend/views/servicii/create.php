<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Servicii */

$this->title = 'Create Servicii';
$this->params['breadcrumbs'][] = ['label' => 'Serviciis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicii-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
