<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ServiciiExceptii */

$this->title = 'Create Servicii Exceptii';
$this->params['breadcrumbs'][] = ['label' => 'Servicii Exceptiis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicii-exceptii-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
