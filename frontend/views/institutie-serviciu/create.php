<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutieServiciu */

$this->title = 'Create Institutie Serviciu';
$this->params['breadcrumbs'][] = ['label' => 'Institutie Servicius', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutie-serviciu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
