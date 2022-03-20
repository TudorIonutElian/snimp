<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Prestari */

$this->title = 'Adaugă Serviciu prestat';
$this->params['breadcrumbs'][] = ['label' => 'Prestaris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestari-create">

    <h1 class="text-center my-2"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
