<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Structuri */

$this->title = 'Update Structuri: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Structuris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="structuri-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
