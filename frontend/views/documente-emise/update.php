<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DocumenteEmise */

$this->title = 'Update Documente Emise: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Documente Emises', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="documente-emise-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
