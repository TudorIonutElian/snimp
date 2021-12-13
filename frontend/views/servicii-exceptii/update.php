<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ServiciiExceptii */

$this->title = 'Update Servicii Exceptii: ' . $model->id_se;
$this->params['breadcrumbs'][] = ['label' => 'Servicii Exceptiis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_se, 'url' => ['view', 'id_se' => $model->id_se]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servicii-exceptii-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
