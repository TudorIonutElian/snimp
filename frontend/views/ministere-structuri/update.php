<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MinistereStructuri */

$this->title = 'Update Ministere Structuri: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ministere Structuris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ministere-structuri-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
