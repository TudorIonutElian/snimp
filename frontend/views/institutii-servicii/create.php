<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutiiServicii */

$this->title = 'Create Institutii Servicii';
$this->params['breadcrumbs'][] = ['label' => 'Institutii Serviciis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutii-servicii-create">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
