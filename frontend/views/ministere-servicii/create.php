<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MinistereServicii */

$this->title = 'Create Ministere Servicii';
$this->params['breadcrumbs'][] = ['label' => 'Ministere Serviciis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ministere-servicii-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
