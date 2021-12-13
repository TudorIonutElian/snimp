<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Exceptii */

$this->title = 'Create Exceptii';
$this->params['breadcrumbs'][] = ['label' => 'Exceptiis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exceptii-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
