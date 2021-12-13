<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Institutie */

$this->title = 'Create Institutie';
$this->params['breadcrumbs'][] = ['label' => 'Instituties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutie-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
