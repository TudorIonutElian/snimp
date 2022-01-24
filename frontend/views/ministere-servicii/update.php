<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MinistereServicii */

$this->title = 'Update Ministere Servicii: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ministere Serviciis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ministere-servicii-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
