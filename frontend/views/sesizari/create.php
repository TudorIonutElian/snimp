<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Sesizari */

$this->title = 'Create Sesizari';
$this->params['breadcrumbs'][] = ['label' => 'Sesizaris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sesizari-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
