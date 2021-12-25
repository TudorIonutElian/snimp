<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Sesizare */

$this->title = 'Create Sesizare';
$this->params['breadcrumbs'][] = ['label' => 'Sesizares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sesizare-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
